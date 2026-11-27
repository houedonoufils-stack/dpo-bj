<?php

test("l'accueil s'affiche avec l'avertissement APDP et les appels à l'action", function () {
    $this->get('/')
        ->assertOk()
        ->assertSee("sans lien avec l'Autorité de protection des données personnelles", false)
        ->assertSee('Faire le diagnostic gratuit')
        ->assertSee('Demander une démo');
});

test("l'accueil présente dpo.bj : qui est concerné et les trois réponses", function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Qui est concerné ?')
        ->assertSee('Organismes publics')
        ->assertSeeInOrder(["L'outil Sitael", "L'accompagnement", 'La formation'])
        ->assertSee('href="'.route('site.outil').'"', false)
        ->assertSee('href="'.route('site.services').'"', false)
        ->assertSee('href="'.route('site.academie').'"', false);
});

test("l'accueil explique la vidéosurveillance avec le décret de 2017", function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Vous avez des caméras de surveillance ?')
        ->assertSee('décret n° 2017-077');
});

test("l'accueil rappelle les tarifs en annuel uniquement", function () {
    // Essentiel : 20 000 × 10 = 200 000 FCFA HT par an
    $this->get('/')
        ->assertOk()
        ->assertSee('Annuel · 2 mois offerts')
        ->assertSee('200 000 FCFA HT par an')
        ->assertDontSee('par mois');
});

test("le détail de Sitael n'est plus sur l'accueil", function () {
    $this->get('/')
        ->assertOk()
        ->assertDontSee('Sitael en action')
        ->assertDontSee('en huit étapes')
        ->assertDontSee('cabinets');
});