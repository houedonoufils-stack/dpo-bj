<?php

/*
|--------------------------------------------------------------------------
| Offres et tarifs (section 4.2 du cahier des charges)
|--------------------------------------------------------------------------
| Montants HT en FCFA, indicatifs : à valider par l'étude de marché.
*/

return [

    'tva' => 0.18,                  // TVA béninoise, à confirmer par le fiscaliste
    'remise_annuelle_mois' => 2,    // HYPOTHÈSE : en annuel, 2 mois offerts (12 mois payés 10)
    'essai_jours' => 15,

    'offres' => [
        [
            'slug' => 'essentiel',
            'nom' => 'Essentiel',
            'cible' => 'TPE et PME',
            'prix_mensuel' => 20000,
            'complement' => null,
            'mise_en_avant' => false,
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
            'cible' => 'ETI et administrations',
            'prix_mensuel' => 60000,
            'complement' => null,
            'mise_en_avant' => true,
            'inclus' => [
                '10 utilisateurs',
                'Tout Essentiel',
                'Transferts hors du Bénin',
                "Analyses d'impact (AIPD)",
                "Rapport annuel à l'APDP",
            ],
        ],
        [
            'slug' => 'cabinet',
            'nom' => 'Cabinet DPO',
            'cible' => 'DPO externes et cabinets',
            'prix_mensuel' => 150000,
            'complement' => '+ par client',
            'mise_en_avant' => false,
            'inclus' => [
                'Plusieurs organisations clientes',
                'Espaces cloisonnés par client',
                'Vue consolidée et notes privées',
                'Tout Pro pour chaque client',
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