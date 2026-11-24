<?php

use App\Models\User;

test("un visiteur non connecté est renvoyé vers la connexion du back-office", function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});

test("un client de Sitael ou un apprenant n'entre pas dans le back-office", function () {
    $client = User::factory()->create(['role_plateforme' => null]);

    $this->actingAs($client)->get('/admin')->assertForbidden();
});

test("un administrateur dpo.bj entre dans le back-office", function () {
    $admin = User::factory()->create(['role_plateforme' => 'admin']);

    $this->actingAs($admin)->get('/admin')->assertOk();
});

test("le rôle plateforme ne peut pas être rempli par un formulaire", function () {
    expect((new User)->isFillable('role_plateforme'))->toBeFalse();
});