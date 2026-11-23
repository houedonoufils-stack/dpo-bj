<?php

use App\Services\Diagnostic;

/** Construit des réponses : « non » partout, sauf les questions données. */
function reponses(array $oui = []): array
{
    $reponses = array_fill_keys(array_keys(Diagnostic::QUESTIONS), 'non');

    foreach ($oui as $cle) {
        $reponses[$cle] = 'oui';
    }

    return $reponses;
}

test('une commune doit désigner un DPO et passer par un acte réglementaire', function () {
    $resultat = (new Diagnostic)->evaluer(reponses(['public']));

    expect($resultat['dpo_obligatoire'])->toBeTrue()
        ->and(implode(' ', $resultat['formalites']))->toContain('art. 411')
        ->and(implode(' ', $resultat['formalites']))->toContain("Désignation d'un DPO obligatoire");
});

test('une clinique qui traite des données de santé doit demander une autorisation', function () {
    $resultat = (new Diagnostic)->evaluer(reponses(['sensibles']));

    expect(implode(' ', $resultat['formalites']))->toContain('Autorisation préalable')
        ->and(implode(' ', $resultat['formalites']))->toContain('données sensibles');
});

test('une PME sans risque et sans démarche obtient 15 points et une déclaration préalable', function () {
    $resultat = (new Diagnostic)->evaluer(reponses());

    expect($resultat['score'])->toBe(15)
        ->and($resultat['niveau'])->toBe('urgent')
        ->and($resultat['dpo_obligatoire'])->toBeFalse()
        ->and(implode(' ', $resultat['formalites']))->toContain('déclaration préalable (art. 405)');
});

test('un organisme avec registre, récépissé et DPO obtient 100', function () {
    $resultat = (new Diagnostic)->evaluer(reponses(['dpo', 'registre', 'recepisse']));

    expect($resultat['score'])->toBe(100)
        ->and($resultat['niveau'])->toBe('bon');
});

test('la dispense grâce au DPO ne vaut pas pour un organisme public', function () {
    $resultat = (new Diagnostic)->evaluer(reponses(['public', 'dpo']));

    expect(implode(' ', $resultat['formalites']))->not->toContain('art. 408');
});