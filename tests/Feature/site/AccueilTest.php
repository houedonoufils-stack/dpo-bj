<?php

test("l'accueil s'affiche avec l'avertissement APDP et les appels à l'action", function () {
    $this->get('/')
        ->assertOk()
        ->assertSee("sans lien avec l'Autorité de protection des données personnelles", false)
        ->assertSee('Tester mon niveau de conformité')
        ->assertSee('Demander une démo')
        ->assertSee('Essayer gratuitement');
});

test("l'accueil affiche les 5 piliers", function () {
    $reponse = $this->get('/');

    foreach (['Déclarer', 'Autoriser', 'Protéger', 'Notifier', 'Prouver'] as $pilier) {
        $reponse->assertSee($pilier);
    }
});