<?php

test('la page Outil présente Sitael, ses modules et le téléchargement à venir', function () {
    $this->get('/outil')
        ->assertOk()
        ->assertSee('Accéder à Sitael')
        ->assertSee("Télécharger l'application", false)
        ->assertSee('Dossiers APDP')
        ->assertSee('Déclarer une violation');
});

test('les anciennes adresses Logiciel redirigent vers Outil', function () {
    $this->get('/logiciel')->assertRedirect('/outil');
    $this->get('/logiciel/mobile')->assertRedirect('/outil');
});

test('le menu affiche Outil, Formation et Quiz', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('Outil</a>', false)
                ->assertSee('Formation</a>', false)
        ->assertSee('Quiz</a>', false)
        ->assertDontSee('Apprendre</button>', false)
        ->assertDontSee('Logiciel</button>', false);
});

test('le logo est affiché', function () {
    $this->get('/')->assertSee('images/logo-dpo.png', false);
});