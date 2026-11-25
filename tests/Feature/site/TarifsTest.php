<?php

test('les tarifs sont affichés par an, avec 2 mois offerts', function () {
    // 20 000 × 10 = 200 000 ; 60 000 × 10 = 600 000 ; 150 000 × 10 = 1 500 000
    $this->get('/tarifs')
        ->assertOk()
        ->assertSee('200 000')
        ->assertSee('600 000')
        ->assertSee('1 500 000')
        ->assertSee('Sur devis')
        ->assertSee('par an')
        ->assertSee('Annuel · 2 mois offerts');
});

test("il n'y a plus de tarif mensuel", function () {
    $this->get('/tarifs')
        ->assertOk()
        ->assertDontSee('par mois')
        ->assertDontSee('Mensuel');
});

test("la page mentionne la TVA et l'essai gratuit", function () {
    $this->get('/tarifs')
        ->assertOk()
        ->assertSee('TVA de 18 %')
        ->assertSee('Essai gratuit de 15 jours');
});