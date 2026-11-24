<?php

test('la bibliothèque affiche les 13 formulaires', function () {
    $reponse = $this->get('/formulaires')->assertOk();

    expect(config('formulaires.liste'))->toHaveCount(13);

    foreach (config('formulaires.liste') as $formulaire) {
        $reponse->assertSee($formulaire['titre']);
    }
});

test('la recherche filtre les formulaires', function () {
    $this->get('/formulaires?q=transfert')
        ->assertOk()
        ->assertSee('Annexe 4 – Transfert')
        ->assertDontSee('Fiche de recensement des entreprises');
});

test('la recherche ignore les accents et les majuscules', function () {
    $this->get('/formulaires?q=MEDIAS')
        ->assertOk()
        ->assertSee("Formulaire pour les métiers de l'image et des médias");
});

test('une recherche sans résultat affiche un message', function () {
    $this->get('/formulaires?q=xyz')
        ->assertOk()
        ->assertSee('Aucun formulaire ne correspond');
});

test('la page rappelle que dpo.bj est sans lien avec l\'APDP', function () {
    // Texte écrit directement dans la vue (sans {{ }}) : on cherche le HTML tel quel, d'où « false »
    $this->get('/formulaires')
        ->assertOk()
        ->assertSee("dpo.bj est un service privé, sans lien avec l'APDP.", false);
});