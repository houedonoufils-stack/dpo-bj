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

test('chaque formation présente ses objectifs et sa pratique sur Sitael', function () {
    $this->get('/academie')
        ->assertOk()
        ->assertSee('Apprendre en pratiquant')
        ->assertSee('Pratique sur Sitael')
        ->assertSee('Cnam DNT105')
        ->assertSee('Niveau Bac+2 en informatique');
});

test('la page présente les parcours et la validation par quiz à 70 %', function () {
    $this->get('/academie')
        ->assertOk()
        ->assertSee('Les parcours')
        ->assertSee('Certificat DPO')
        ->assertSee('70 %')
        ->assertDontSee('10/20');
});

test("l'accueil ne vise plus les cabinets", function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Pour les responsables de traitement')
        ->assertDontSee('cabinets');
});