<?php

test("les mentions légales affichent « à compléter » tant que l'éditeur n'est pas renseigné", function () {
    config(['editeur.rccm' => null]);

    $this->get('/mentions-legales')
        ->assertOk()
        ->assertSee('Éditeur du site')
        ->assertSee('Hébergement')
        ->assertSee('à compléter');
});

test("les mentions légales affichent le RCCM une fois renseigné", function () {
    config(['editeur.rccm' => 'RB/COT/26 B 12345']);

    $this->get('/mentions-legales')
        ->assertOk()
        ->assertSee('RB/COT/26 B 12345');
});

test('la politique de confidentialité décrit les traitements et les droits', function () {
    $this->get('/confidentialite')
        ->assertOk()
        ->assertSee('Formulaire de contact')
        ->assertSee('Diagnostic gratuit')
        ->assertSee('Compte Sitael')
        ->assertSee('dpo@dpo.bj')
        ->assertSee('art. 448');
});

test('la durée de conservation affichée correspond à celle du code', function () {
    $this->get('/confidentialite')
        ->assertOk()
        ->assertSee(App\Models\DemandeContact::CONSERVATION_ANNEES.' ans après la réception');
});


test("le pied de page affiche l'éditeur HOUEDONOU & FILS", function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('HOUEDONOU &amp; FILS', false)
        ->assertSee('RB/PNO/24 B 5316');
});