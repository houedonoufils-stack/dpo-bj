<?php

use App\Models\Formation;
use App\Models\FormationSession;
use App\Models\User;
use Illuminate\Database\QueryException;

function creerAdmin(): User
{
    $admin = User::factory()->create();
    $admin->forceFill(['role_plateforme' => 'admin'])->save();

    return $admin;
}

function creerSession(): FormationSession
{
    $formation = Formation::create([
        'slug' => 'adb-dpo-test',
        'titre' => 'Formation DPO de test',
        'public' => 'Futurs DPO',
        'duree' => '36 h',
        'description' => 'Formation de test.',
        'active' => true,
    ]);

    return FormationSession::create([
        'formation_id' => $formation->id,
        'debut' => now()->addWeek(),
        'fin' => now()->addWeek()->addDays(4),
    ]);
}

test('un admin voit la liste des sessions avec le titre de la formation', function () {
    creerSession();

    $this->actingAs(creerAdmin())
        ->get('/admin/formation-sessions')
        ->assertOk()
        ->assertSee('Formation DPO de test');
});

test('un admin peut ouvrir le formulaire de création de session', function () {
    $this->actingAs(creerAdmin())
        ->get('/admin/formation-sessions/create')
        ->assertOk();
});

test('un utilisateur sans rôle ne peut pas voir les sessions', function () {
    $this->actingAs(User::factory()->create())
        ->get('/admin/formation-sessions')
        ->assertForbidden();
});

test('une nouvelle session est planifiée par défaut', function () {
    expect(creerSession()->statut)->toBe('planifiee');
});

test('une même adresse ne peut pas être inscrite deux fois à la même session', function () {
    $session = creerSession();

    $session->inscriptions()->create(['nom' => 'Apprenant Un', 'email' => 'apprenant@exemple.bj']);

    expect(fn () => $session->inscriptions()->create(['nom' => 'Apprenant Bis', 'email' => 'apprenant@exemple.bj']))
        ->toThrow(QueryException::class);
});

test('on ne peut pas créer deux fois la même formation sur le même créneau', function () {
    $session = creerSession();

    $this->actingAs(creerAdmin());

    Livewire\Livewire::test(App\Filament\Resources\FormationSessions\Pages\CreateFormationSession::class)
        ->fillForm([
            'formation_id' => $session->formation_id,
            'debut' => $session->debut->format('Y-m-d H:i:s'),
            'fin' => $session->fin->format('Y-m-d H:i:s'),
            'statut' => 'planifiee',
        ])
        ->call('create')
        ->assertHasFormErrors(['formation_id']);
});

test('un formateur ne peut pas avoir deux sessions qui se chevauchent', function () {
    $formateur = User::factory()->create();
    $formateur->forceFill(['role_plateforme' => 'formateur'])->save();

    $session = creerSession();
    $session->update(['formateur_id' => $formateur->id]);

    $autre = Formation::create(['slug' => 'adb-autre', 'titre' => 'Autre formation', 'active' => true]);

    $this->actingAs(creerAdmin());

    Livewire\Livewire::test(App\Filament\Resources\FormationSessions\Pages\CreateFormationSession::class)
        ->fillForm([
            'formation_id' => $autre->id,
            'formateur_id' => $formateur->id,
            'debut' => $session->debut->copy()->addHour()->format('Y-m-d H:i:s'),
            'fin' => $session->fin->copy()->addDay()->format('Y-m-d H:i:s'),
            'statut' => 'planifiee',
        ])
        ->call('create')
        ->assertHasFormErrors(['formateur_id']);
});

test('une session annulée libère le créneau', function () {
    $session = creerSession();
    $session->update(['statut' => 'annulee']);

    $this->actingAs(creerAdmin());

    Livewire\Livewire::test(App\Filament\Resources\FormationSessions\Pages\CreateFormationSession::class)
        ->fillForm([
            'formation_id' => $session->formation_id,
            'debut' => $session->debut->format('Y-m-d H:i:s'),
            'fin' => $session->fin->format('Y-m-d H:i:s'),
            'statut' => 'planifiee',
        ])
        ->call('create')
        ->assertHasNoFormErrors();
});

test('un admin voit la liste des formations', function () {
    creerSession();

    $this->actingAs(creerAdmin())
        ->get('/admin/formations')
        ->assertOk()
        ->assertSee('Formation DPO de test');
});

test('le tableau de bord affiche les compteurs et les prochaines sessions', function () {
    creerSession();

    $this->actingAs(creerAdmin())
        ->get('/admin')
        ->assertOk()
        ->assertSee('Sessions à venir')
        ->assertSee('Prochaines sessions')
        ->assertSee('Formation DPO de test');
});

test('un admin crée un formateur, qui reçoit un lien pour choisir son mot de passe', function () {
    Illuminate\Support\Facades\Notification::fake();

    $this->actingAs(creerAdmin());

    Livewire\Livewire::test(App\Filament\Resources\Formateurs\Pages\CreateFormateur::class)
        ->fillForm(['name' => 'Awa Formatrice', 'email' => 'awa@exemple.bj'])
        ->call('create')
        ->assertHasNoFormErrors();

    $formateur = User::where('email', 'awa@exemple.bj')->firstOrFail();

    expect($formateur->role_plateforme)->toBe('formateur')
        ->and($formateur->hasVerifiedEmail())->toBeTrue();

    Illuminate\Support\Facades\Notification::assertSentTo($formateur, Illuminate\Auth\Notifications\ResetPassword::class);
});

test('une adresse en majuscules est refusée pour un formateur', function () {
    $this->actingAs(creerAdmin());

    Livewire\Livewire::test(App\Filament\Resources\Formateurs\Pages\CreateFormateur::class)
        ->fillForm(['name' => 'Awa Formatrice', 'email' => 'Awa@Exemple.bj'])
        ->call('create')
        ->assertHasFormErrors(['email']);
});

test('un formateur ne peut pas gérer les autres formateurs', function () {
    $formateur = User::factory()->create();
    $formateur->forceFill(['role_plateforme' => 'formateur'])->save();

    $this->actingAs($formateur)
        ->get('/admin/formateurs')
        ->assertForbidden();
});