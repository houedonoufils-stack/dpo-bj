<?php

test('les tarifs mensuels sont affichés en FCFA', function () {
    $this->get('/tarifs')
        ->assertOk()
        ->assertSee('20 000')
        ->assertSee('60 000')
        ->assertSee('150 000')
        ->assertSee('Sur devis')
        ->assertSee('par mois');
});

test("le tarif annuel applique les mois offerts", function () {
    // 20 000 FCFA × (12 − 2) mois = 200 000 FCFA par an
    $this->get('/tarifs?facturation=annuelle')
        ->assertOk()
        ->assertSee('200 000')
        ->assertSee('par an');
});

test('une valeur inconnue revient au tarif mensuel', function () {
    $this->get('/tarifs?facturation=nimportequoi')
        ->assertOk()
        ->assertSee('par mois');
});

test("la page mentionne la TVA et l'essai gratuit", function () {
    $this->get('/tarifs')
        ->assertOk()
        ->assertSee('TVA de 18 %')
        ->assertSee('Essai gratuit de 15 jours');
});