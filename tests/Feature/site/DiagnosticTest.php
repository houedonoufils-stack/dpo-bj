<?php

use App\Services\Diagnostic;

test('la page du diagnostic affiche les 10 questions', function () {
    $reponse = $this->get('/diagnostic')->assertOk();

    expect(Diagnostic::QUESTIONS)->toHaveCount(10);

    foreach (array_keys(Diagnostic::QUESTIONS) as $cle) {
        $reponse->assertSee("reponses[$cle]", false);
    }
});

test('le diagnostic affiche un résultat quand toutes les réponses sont données', function () {
    $reponses = array_fill_keys(array_keys(Diagnostic::QUESTIONS), 'non');

    $this->post('/diagnostic', ['reponses' => $reponses])
        ->assertOk()
        ->assertSee('Votre score indicatif')
        ->assertSee('Vos formalités probables');
});

test('le diagnostic refuse un questionnaire incomplet', function () {
    $this->post('/diagnostic', ['reponses' => ['public' => 'oui']])
        ->assertSessionHasErrors('reponses.sensibles');
});

test('le diagnostic refuse une valeur autre que oui ou non', function () {
    $reponses = array_fill_keys(array_keys(Diagnostic::QUESTIONS), 'non');
    $reponses['public'] = 'peut-être';

    $this->post('/diagnostic', ['reponses' => $reponses])
        ->assertSessionHasErrors('reponses.public');
});