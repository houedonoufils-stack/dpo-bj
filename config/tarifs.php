<?php

/*
|--------------------------------------------------------------------------
| Offres et tarifs (section 4.2 du cahier des charges)
|--------------------------------------------------------------------------
| Montants HT en FCFA, indicatifs : à valider par l'étude de marché.
| Corrections du boss (27/11) : Essentiel pour les startups et PME (le plus choisi),
| Pro pour les institutions et administrations, offre Cabinet DPO retirée.
*/

return [

    'tva' => 0.18,                  // TVA béninoise, à confirmer par le fiscaliste
    'remise_annuelle_mois' => 2,    // en annuel, 2 mois offerts (12 mois payés 10)
    'essai_jours' => 15,

    'offres' => [
        [
            'slug' => 'essentiel',
            'nom' => 'Essentiel',
            'cible' => 'Startups et PME',
            'prix_mensuel' => 20000,
            'complement' => null,
            'mise_en_avant' => true,
            'inclus' => [
                '1 organisation, 3 utilisateurs',
                'Registre et qualification du régime',
                'Dossiers APDP et suivi des délais',
                'Demandes de droits et violations',
            ],
        ],
        [
            'slug' => 'pro',
            'nom' => 'Pro',
            'cible' => 'Institutions et administrations',
            'prix_mensuel' => 60000,
            'complement' => null,
            'mise_en_avant' => false,
            'inclus' => [
                '10 utilisateurs',
                'Tout Essentiel',
                'Transferts hors du Bénin',
                "Analyses d'impact (AIPD)",
                "Rapport annuel à l'APDP",
            ],
        ],
        [
            'slug' => 'accompagnement',
            'nom' => 'Accompagnement',
            'cible' => 'En option',
            'prix_mensuel' => null,          // null = sur devis
            'complement' => null,
            'mise_en_avant' => false,
            'inclus' => [
                'Aide à un dossier APDP',
                "Aide à une analyse d'impact",
                'DPO externe',
            ],
        ],
    ],

];