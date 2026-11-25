<?php

/*
|--------------------------------------------------------------------------
| Informations légales de l'éditeur de dpo.bj
|--------------------------------------------------------------------------
| Société éditrice : HOUEDONOU & FILS SARL, qui édite aussi sedjro.africa.
| Source : mentions légales de sedjro.africa (mises à jour le 16/11/2026).
| Une valeur null s'affiche « à compléter » : on n'invente jamais une
| information légale.
*/

return [

    'raison_sociale' => env('EDITEUR_RAISON_SOCIALE', 'HOUEDONOU & FILS'),
    'forme_juridique' => env('EDITEUR_FORME', 'SARL au capital de 1 000 000 FCFA'),
    'siege' => env('EDITEUR_SIEGE', 'Lot 147 Foun-Foun Sodji, Porto-Novo, République du Bénin'),
    'rccm' => env('EDITEUR_RCCM', 'RB/PNO/24 B 5316 du 17/05/2024'),
    'ifu' => env('EDITEUR_IFU', '320 265 9045 743'),
    'telephone' => env('EDITEUR_TELEPHONE', '+229 01 6161 4747'),
    'directeur_publication' => env('EDITEUR_DIRECTEUR_PUBLICATION', 'M. GBENOU Habib Isaac, Directeur Général'),

    // Hébergeur de dpo.bj : à choisir (au Bénin d'après la section 5 du cahier des charges)
    'hebergeur' => [
        'nom' => env('HEBERGEUR_NOM'),
        'adresse' => env('HEBERGEUR_ADRESSE'),
        'telephone' => env('HEBERGEUR_TELEPHONE'),
    ],

    // Formalités de dpo.bj auprès de l'APDP pour ses propres traitements
    'recepisse_apdp' => env('EDITEUR_RECEPISSE_APDP'),

    'politique_mise_a_jour' => '25/11/2026',

];