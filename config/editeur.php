<?php

/*
|--------------------------------------------------------------------------
| Informations légales de l'éditeur de dpo.bj
|--------------------------------------------------------------------------
| À COMPLÉTER avant la mise en ligne. Une valeur null s'affiche
| « à compléter » sur le site : on n'invente jamais une information légale.
*/

return [

    'raison_sociale' => env('EDITEUR_RAISON_SOCIALE'),        // ex. « DPO BJ SARL »
    'forme_juridique' => env('EDITEUR_FORME'),                // ex. « SARL au capital de … FCFA »
    'siege' => env('EDITEUR_SIEGE'),                          // adresse complète à Cotonou
    'rccm' => env('EDITEUR_RCCM'),
    'ifu' => env('EDITEUR_IFU'),
    'telephone' => env('EDITEUR_TELEPHONE'),
    'directeur_publication' => env('EDITEUR_DIRECTEUR_PUBLICATION'),

    // Hébergeur : au Bénin d'après la section 5 du cahier des charges
    'hebergeur' => [
        'nom' => env('HEBERGEUR_NOM'),
        'adresse' => env('HEBERGEUR_ADRESSE'),
        'telephone' => env('HEBERGEUR_TELEPHONE'),
    ],

    // Formalités de dpo.bj auprès de l'APDP pour ses propres traitements
    'recepisse_apdp' => env('EDITEUR_RECEPISSE_APDP'),

    'politique_mise_a_jour' => '24/11/2026',

];