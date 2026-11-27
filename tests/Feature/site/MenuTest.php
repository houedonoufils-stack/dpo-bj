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
            'Formation</a>',
            'Quiz</a>',
            'Contact</a>',
            'Diagnostic gratuit',
            'Se connecter à Sitael',
        ], false)
        ->assertDontSee('Solutions</button>', false);
});

test('Formation est un lien direct, sans menu déroulant', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('href="'.route('site.academie').'"', false)
        ->assertDontSee('class="dd"', false)
        ->assertDontSee('Formation</button>', false);
});

test('les pages Livre V, Formulaires et Ressources sont dans le pied de page', function () {
    $this->get('/')
        ->assertOk()
        ->assertSeeInOrder([
            '<footer',
            'Ressources</b>',
            'Comprendre le Livre V',
            'Formulaires APDP',
            'Ressources et blog',
        ], false)
        ->assertDontSee('houedonou.fils@gmail.com');
});