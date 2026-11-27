<?php

use App\Models\User;

test("un compte sans espace en reçoit un au lieu de provoquer une erreur", function () {
    $user = User::factory()->create();

    // Un visiteur déjà connecté qui ouvre une page réservée aux invités est renvoyé vers son tableau de bord
    $this->actingAs($user)
        ->get('/login')
        ->assertRedirect();

    expect($user->fresh()->currentTeam)->not->toBeNull();
});