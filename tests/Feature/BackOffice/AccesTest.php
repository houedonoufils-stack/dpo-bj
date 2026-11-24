<?php

use App\Models\User;
use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;

test('le modèle User déclare bien FilamentUser', function () {
    // Sans cette déclaration, Filament refuse tout le monde en production
    expect(new User)->toBeInstanceOf(FilamentUser::class);
});

test("un visiteur non connecté est renvoyé vers la connexion du back-office", function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});

test("un client de Sitael ou un apprenant n'entre pas dans le back-office", function () {
    $client = User::factory()->create(['role_plateforme' => null]);

    $this->actingAs($client)->get('/admin')->assertForbidden();
});

test("un administrateur dpo.bj entre dans le back-office", function () {
    $admin = User::factory()->create(['role_plateforme' => 'admin']);
    $admin->refresh();

    expect($admin->role_plateforme)->toBe('admin')
        ->and($admin->hasVerifiedEmail())->toBeTrue()
        ->and($admin->canAccessPanel(Filament::getPanel('admin')))->toBeTrue();

    $this->actingAs($admin)->get('/admin')->assertOk();
});

test("un administrateur dont l'e-mail n'est pas vérifié n'entre pas", function () {
    $admin = User::factory()->unverified()->create(['role_plateforme' => 'admin']);

    $this->actingAs($admin)->get('/admin')->assertForbidden();
});

test("le rôle plateforme ne peut pas être rempli par un formulaire", function () {
    expect((new User)->isFillable('role_plateforme'))->toBeFalse();
});