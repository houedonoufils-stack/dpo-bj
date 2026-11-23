<?php

test('la page Sitael web présente les modules phares', function () {
    $reponse = $this->get('/logiciel')->assertOk();

    foreach (['Dossiers APDP', 'Registre des traitements', "Analyses d'impact (AIPD)", 'Violations de données'] as $module) {
        $reponse->assertSee($module);
    }
});

test('la page Sitael mobile présente les 8 écrans', function () {
    $this->get('/logiciel/mobile')
        ->assertOk()
        ->assertSee('Déclarer une violation')
        ->assertSee('Mode atelier hors ligne')
        ->assertSee('Mode guichet');
});