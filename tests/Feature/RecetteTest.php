<?php

function avecIdentifiants(string $utilisateur, string $motDePasse): array
{
    return ['Authorization' => 'Basic '.base64_encode("$utilisateur:$motDePasse")];
}

beforeEach(function () {
    config([
        'recette.active' => true,
        'recette.utilisateur' => 'boss',
        'recette.mot_de_passe' => 'secret-de-test',
    ]);
});

test('le site de test demande un mot de passe', function () {
    $this->get('/')->assertStatus(401)
        ->assertHeader('X-Robots-Tag', 'noindex, nofollow');
});

test('un mauvais mot de passe est refusé', function () {
    $this->withHeaders(avecIdentifiants('boss', 'mauvais'))->get('/')->assertStatus(401);
});

test('le bon mot de passe ouvre le site, avec le bandeau et sans indexation', function () {
    $this->withHeaders(avecIdentifiants('boss', 'secret-de-test'))->get('/')
        ->assertOk()
        ->assertHeader('X-Robots-Tag', 'noindex, nofollow')
        ->assertSee('Site de test', false);
});

test('sans le mode recette, le site est ouvert normalement', function () {
    config(['recette.active' => false]);

    $this->get('/')->assertOk();
});