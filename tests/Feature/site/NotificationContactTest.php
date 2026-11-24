<?php

use App\Notifications\NouvelleDemandeContact;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;

function demandeDeTest(array $modifs = []): array
{
    return array_merge([
        'nom' => 'Awa Dossou',
        'organisation' => 'Clinique Exemple',
        'email' => 'awa@exemple.bj',
        'objet' => 'demo',
        'message' => 'Bonjour, je souhaite une démo.',
    ], $modifs);
}

test("une nouvelle demande prévient contact@dpo.bj", function () {
    Notification::fake();

    $this->post('/contact', demandeDeTest());

    Notification::assertSentOnDemand(
        NouvelleDemandeContact::class,
        fn ($notification, $canaux, $destinataire) => $destinataire->routes['mail'] === 'contact@dpo.bj'
    );
});

test("un robot ne déclenche aucune notification", function () {
    Notification::fake();

    $this->post('/contact', demandeDeTest(['site_web' => 'http://spam.example']));

    Notification::assertNothingSent();
});

test("la notification passe par la file d'attente", function () {
    expect(new NouvelleDemandeContact(1, 'Demander une démo', '24/11/2026 à 10:00'))
        ->toBeInstanceOf(ShouldQueue::class);
});

test("l'e-mail ne contient aucune donnée personnelle", function () {
    $html = (string) (new NouvelleDemandeContact(12, 'Demander une démo', '24/11/2026 à 10:00'))
        ->toMail(new AnonymousNotifiable)
        ->render();

    expect($html)->toContain('n° 12')
        ->toContain('Demander une démo')
        ->not->toContain('Awa Dossou')
        ->not->toContain('awa@exemple.bj');
});