<?php

test('la page Quiz présente les règles décidées', function () {
    $this->get('/quiz')
        ->assertOk()
        ->assertSee('50 questions')
        ->assertSee('3 heures')
        ->assertSee('70 % pour réussir')
        ->assertSee('Accéder à mon quiz');
});