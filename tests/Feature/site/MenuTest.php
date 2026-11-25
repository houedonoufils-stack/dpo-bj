<?php

test('le bouton du menu mobile est présent et accessible', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('class="burger"', false)
        ->assertSee('aria-controls="menu-principal"', false)
        ->assertSee('id="menu-principal"', false);
});

test('tous les liens du menu sont dans le panneau, dans le bon ordre', function () {
    $this->get('/')
        ->assertOk()
        ->assertSeeInOrder([
            'id="menu-principal"',
            'Accueil</a>',
            'Outil</a>',
            'Tarifs</a>',
            'Services</a>',
            'Formation</button>',
            'Quiz</a>',
            'Contact</a>',
            'Diagnostic gratuit',
            'Se connecter à Sitael',
        ], false)
        ->assertDontSee('Solutions</button>', false);
});