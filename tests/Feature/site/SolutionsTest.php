<?php

test('la page des secteurs présente les 8 secteurs avec leurs ancres', function () {
    $reponse = $this->get('/solutions/secteurs')->assertOk();

    expect(config('secteurs'))->toHaveCount(8);

    foreach (config('secteurs') as $secteur) {
        $reponse->assertSee($secteur['titre'])
            ->assertSee('id="'.$secteur['slug'].'"', false);
    }
});

test("les vignettes de la page Outil mènent au bon secteur", function () {
    $this->get('/outil')
        ->assertOk()
        ->assertSee('/solutions/secteurs#sante', false);
});

test('la page des services présente le DPO externe et les AIPD', function () {
    $this->get('/services')
        ->assertOk()
        ->assertSee('DPO externe')
        ->assertSee("Analyse d'impact (AIPD)");
});