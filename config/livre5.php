<?php

/*
|--------------------------------------------------------------------------
| Fiches « Comprendre le Livre V » (section 4.1 du cahier des charges)
|--------------------------------------------------------------------------
| Livre V de la loi n° 2017-20 du 20 avril 2018 portant Code du numérique,
| modifiée par la loi n° 2020-35. Numérotation à vérifier sur la version
| consolidée du SGG. Contenu à valider par le juriste béninois.
*/

return [

    'fiches' => [
        [
            'slug' => 'champ',
            'titre' => "Le champ d'application",
            'articles' => 'art. 380 à 382',
            'resume' => 'Le Livre V couvre presque tous les traitements de données personnelles, publics comme privés.',
            'points' => [
                'Fichiers numériques et fichiers papier (art. 380).',
                "Responsables établis hors du Bénin qui ciblent ou suivent des personnes au Bénin (art. 381).",
                'Exclu : l\'usage strictement personnel ou domestique (art. 382).',
            ],
        ],
        [
            'slug' => 'formalites',
            'titre' => 'Déclarer ou demander une autorisation',
            'articles' => 'art. 405 à 411',
            'resume' => 'Chaque traitement relève d\'un régime : dispense, norme simplifiée, déclaration, autorisation ou acte réglementaire.',
            'points' => [
                'Régime courant : la déclaration préalable (art. 405).',
                "Autorisation préalable pour 8 catégories : données sensibles, NPI, biométrie, intérêt public, interconnexions, transferts, exclusion d'un droit par traitement automatisé, évaluation des difficultés sociales (art. 407).",
                "Traitements de l'État : décret après avis motivé de l'APDP (art. 411).",
                'Dispenses : comptabilité, paie, fournisseurs, associations pour leurs membres (art. 410).',
            ],
        ],
        [
            'slug' => 'delais',
            'titre' => "Les délais de réponse de l'APDP",
            'articles' => 'art. 412 et 413',
            'resume' => "L'APDP répond sous 60 jours, prorogeables une fois de 30 jours.",
            'points' => [
                "Le délai court à partir de la date de réception du dossier : gardez l'accusé de réception.",
                'Dépôt par voie électronique, postale ou au guichet (art. 413).',
                "N'interprétez pas le silence de l'APDP comme un accord : attendez la décision expresse.",
            ],
        ],
        [
            'slug' => 'dpo',
            'titre' => 'Le DPO et le registre',
            'articles' => 'art. 430 à 432 et 435',
            'resume' => 'Le délégué à la protection des données conseille, contrôle et tient le registre des traitements.',
            'points' => [
                'Obligatoire pour les organismes publics et pour les traitements à grande échelle (art. 430).',
                'Salarié ou prestataire externe, sans conflit d\'intérêts (art. 431).',
                'Un DPO qui tient un registre peut dispenser de déclaration, sauf pour les autorités publiques (art. 408).',
                'Registre écrit obligatoire, PME dispensées sauf traitement à risque (art. 435).',
            ],
        ],
        [
            'slug' => 'sensibles',
            'titre' => 'Données sensibles, pénales et mineurs',
            'articles' => 'art. 394, 395 et 446',
            'resume' => 'Certaines données demandent une exception prévue par la loi et une autorisation.',
            'points' => [
                'Origine, opinions politiques, religion, syndicat, génétique, biométrie, santé, vie sexuelle (art. 394).',
                'Infractions et condamnations : réservées aux acteurs listés (art. 395).',
                'Mineurs : moins de 18 ans ; consentement parental sous 16 ans pour les services en ligne (art. 446).',
            ],
        ],
        [
            'slug' => 'aipd',
            'titre' => "L'analyse d'impact (AIPD)",
            'articles' => 'art. 428 et 429',
            'resume' => 'Obligatoire avant un traitement susceptible de créer un risque élevé pour les personnes.',
            'points' => [
                'Exemples : évaluation automatisée, données sensibles à grande échelle, surveillance de lieux publics (art. 428).',
                'Contenu : description, nécessité, risques, mesures, avis du DPO.',
                "Si le risque reste élevé : consultation préalable de l'APDP, réponse sous 8 semaines + 6 (art. 429).",
            ],
        ],
        [
            'slug' => 'violations',
            'titre' => 'Les violations de données',
            'articles' => 'art. 427',
            'resume' => "Perte, vol, piratage ou divulgation : l'APDP et les personnes doivent être prévenues sans délai.",
            'points' => [
                "Notification « sans délai » à l'APDP et aux personnes concernées.",
                'Dispense de notification individuelle possible si les données étaient chiffrées ou le risque écarté.',
                'Le sous-traitant alerte le responsable du traitement.',
            ],
        ],
        [
            'slug' => 'transferts',
            'titre' => 'Les transferts hors du Bénin',
            'articles' => 'art. 391, 392 et 460',
            'resume' => "Envoyer ou héberger des données à l'étranger est un transfert soumis à autorisation.",
            'points' => [
                "Le pays doit offrir un niveau de protection équivalent, constaté par l'APDP (art. 391).",
                'Exceptions : consentement exprès, contrat, intérêt public, intérêts vitaux (art. 392).',
                'Cela vise aussi les logiciels en ligne et les messageries hébergés à l\'étranger.',
                'Le transfert illicite est pénalement réprimé (art. 460).',
            ],
        ],
        [
            'slug' => 'droits',
            'titre' => 'Les droits des personnes',
            'articles' => 'art. 420 à 447',
            'resume' => 'Chaque droit a son propre délai de réponse, et l\'exercice des droits est gratuit.',
            'points' => [
                'Règle générale : 30 jours, prolongeables de 60 jours (art. 420).',
                'Accès et copie : 60 jours (art. 437).',
                'Opposition : 30 jours (art. 440) ; rectification et effacement : 45 jours (art. 441-442).',
                'Gratuité, sauf demande manifestement abusive (art. 421).',
            ],
        ],
        [
            'slug' => 'sanctions',
            'titre' => 'Les sanctions',
            'articles' => 'art. 452 à 461',
            'resume' => "L'APDP peut mettre en demeure puis sanctionner, et le juge peut prononcer des peines pénales.",
            'points' => [
                'Mise en demeure avec un délai de 8 jours au plus (art. 452).',
                'Jusqu\'à 50 M FCFA, 100 M FCFA en récidive dans les 5 ans (art. 455).',
                'Peines pénales : 6 mois à 10 ans et 10 à 50 M FCFA d\'amende (art. 461).',
            ],
        ],
    ],

    // Comparaison avec le RGPD (section 1 du cahier des charges)
    'comparaison' => [
        ['sujet' => 'Autorité', 'rgpd' => 'CNIL (en France)', 'benin' => "APDP, autorité administrative indépendante (art. 462 et s.)"],
        ['sujet' => 'Formalités', 'rgpd' => 'Quasi supprimées, registre interne', 'benin' => 'Déclaration (art. 405), autorisation pour 8 catégories (art. 407), décret pour l\'État (art. 411)'],
        ['sujet' => 'Effet du DPO', 'rgpd' => 'Aucune dispense', 'benin' => 'Dispense de déclaration possible, sauf autorités publiques (art. 408)'],
        ['sujet' => "Silence de l'autorité", 'rgpd' => 'Sans objet', 'benin' => 'Réponse sous 60 jours + 30 (art. 412) ; attendre la décision expresse'],
        ['sujet' => 'Registre', 'rgpd' => 'Obligatoire (art. 30)', 'benin' => 'Obligatoire, PME dispensées sauf traitement à risque (art. 435)'],
        ['sujet' => 'AIPD', 'rgpd' => 'Obligatoire si risque élevé', 'benin' => 'Obligatoire si risque élevé (art. 428), consultation préalable (art. 429)'],
        ['sujet' => 'Violations', 'rgpd' => 'Notification sous 72 h', 'benin' => '« Sans délai » à l\'APDP et aux personnes (art. 427)'],
        ['sujet' => 'Transferts hors du pays', 'rgpd' => 'Adéquation ou garanties', 'benin' => 'Niveau équivalent constaté par l\'APDP et autorisation préalable (art. 391, 407)'],
        ['sujet' => 'Délais des droits', 'rgpd' => '1 mois + 2', 'benin' => '30 jours + 60 (art. 420) ; accès 60 jours ; rectification 45 jours'],
        ['sujet' => 'Mineurs', 'rgpd' => '13 à 16 ans selon l\'État', 'benin' => 'Moins de 18 ans ; parents sous 16 ans en ligne (art. 446)'],
        ['sujet' => 'Sanction maximale', 'rgpd' => '4 % du CA mondial', 'benin' => '50 M FCFA, 100 M en récidive ou 5 % du CA HT plafonné (art. 455)'],
    ],

];