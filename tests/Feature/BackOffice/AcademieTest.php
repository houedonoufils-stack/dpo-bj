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