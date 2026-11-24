<?php

use App\Models\DemandeContact;

/** Une demande valide, modifiable au besoin. */
function demandeValide(array $modifs = []): array
{
    return array_merge([
        'nom' => 'Awa Dossou',
        'organisation' => 'Clinique Exemple',
        'email' => 'awa@exemple.bj',
        'telephone' => '01 97 00 00 00',
        'objet' => 'demo',
        'message' => 'Bonjour, je souhaite une démo.',
    ], $modifs);
}

test("la page contact affiche le formulaire et les mentions de l'art. 415", function () {
    $this->get('/contact')
        ->assertOk()
        ->assertSee('Responsable du traitement :', false)
        ->assertSee('dpo@dpo.bj', false)
        ->assertSee(DemandeContact::TEXTE_CONSENTEMENT);
});

test('une demande valide est enregistrée sans consentement par défaut', function () {
    $this->post('/contact', demandeValide())
        ->assertRedirect(route('site.contact'))
        ->assertSessionHas('succes');

    $this->assertDatabaseHas('demande_contacts', [
        'email' => 'awa@exemple.bj',
        'telephone' => '0197000000',          // espaces retirés
        'consentement_prospection' => false,
        'consentement_texte' => null,
    ]);
});

test('le consentement enregistre le texte présenté et la date', function () {
    $this->post('/contact', demandeValide(['consentement' => '1']));

    $demande = DemandeContact::first();

    expect($demande->consentement_prospection)->toBeTrue()
        ->and($demande->consentement_texte)->toBe(DemandeContact::TEXTE_CONSENTEMENT)
        ->and($demande->consentement_le)->not->toBeNull();
});

test("un robot qui remplit le champ piège n'enregistre rien", function () {
    $this->post('/contact', demandeValide(['site_web' => 'http://spam.example']))
        ->assertRedirect(route('site.contact'));

    expect(DemandeContact::count())->toBe(0);
});

test('un e-mail invalide et un numéro non béninois sont refusés', function () {
    $this->post('/contact', demandeValide(['email' => 'pas-un-email', 'telephone' => '12345']))
        ->assertSessionHasErrors(['email', 'telephone']);

    expect(DemandeContact::count())->toBe(0);
});

test('les demandes de plus de 3 ans sont supprimées automatiquement', function () {
    $ancienne = DemandeContact::create(demandeValide(['email' => 'ancienne@exemple.bj']));
    $ancienne->created_at = now()->subYears(3)->subDay();
    $ancienne->save();

    $recente = DemandeContact::create(demandeValide(['email' => 'recente@exemple.bj']));

    $this->artisan('model:prune', ['--model' => [DemandeContact::class]]);

    expect(DemandeContact::whereKey($ancienne->id)->exists())->toBeFalse()
        ->and(DemandeContact::whereKey($recente->id)->exists())->toBeTrue();
});