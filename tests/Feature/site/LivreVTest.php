<?php

test('la page Livre V présente les 10 fiches avec leurs ancres', function () {
    $reponse = $this->get('/livre-v')->assertOk();

    expect(config('livre5.fiches'))->toHaveCount(10);

    foreach (config('livre5.fiches') as $fiche) {
        $reponse->assertSee($fiche['titre'])
            ->assertSee('id="'.$fiche['slug'].'"', false);
    }
});

test('la page Livre V compare le Bénin et le RGPD', function () {
    $this->get('/livre-v')
        ->assertOk()
        ->assertSee('Ce qui change par rapport au RGPD')
        ->assertSee('APDP, autorité administrative indépendante');
});