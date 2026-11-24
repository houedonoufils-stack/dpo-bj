<?php

test("l'Académie présente les 6 formations", function () {
    $reponse = $this->get('/academie')->assertOk();

    expect(config('apprendre.formations'))->toHaveCount(6);

    foreach (config('apprendre.formations') as $formation) {
        $reponse->assertSee($formation['titre']);
    }
});

test("l'Académie n'annonce pas de session inventée", function () {
    $this->get('/academie')
        ->assertOk()
        ->assertSee("Aucune session n'est encore programmée.", false);
});

test('les ressources présentent les modèles à venir', function () {
    $reponse = $this->get('/ressources')->assertOk();

    foreach (config('apprendre.modeles') as $modele) {
        $reponse->assertSee($modele);
    }

    $reponse->assertSee('Bientôt');
});