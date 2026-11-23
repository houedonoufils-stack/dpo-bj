<?php

/*
|--------------------------------------------------------------------------
| Secteurs couverts par dpo.bj (sections 2.2, 3.1 et 4.1 du cahier des charges)
|--------------------------------------------------------------------------
| Contenu indicatif, à faire valider par le juriste béninois.
| 'texte' = résumé court (vignettes de l'accueil).
*/

return [
    [
        'slug' => 'banque',
        'titre' => 'Banque',
        'texte' => 'Connaissance client, crédit, lutte contre le blanchiment, règles BCEAO.',
        'traitements' => ['Ouverture de compte et connaissance client', 'Octroi et suivi des crédits', 'Lutte contre le blanchiment', 'Vidéosurveillance des agences'],
        'formalites' => ['Déclaration préalable pour la gestion de la clientèle (art. 405)', "Autorisation si NPI, biométrie ou transfert vers la maison mère (art. 407)"],
        'attention' => ["Score de crédit automatisé : droit de la personne à faire valoir son point de vue (art. 401)", 'Règles de la BCEAO et secret bancaire'],
    ],
    [
        'slug' => 'microfinance',
        'titre' => 'Microfinance et monnaie électronique',
        'texte' => 'Dossiers de prêt, agents, portefeuilles Mobile Money.',
        'traitements' => ['Dossiers de prêt et de garantie', 'Réseau d\'agents et collecte sur le terrain', 'Portefeuilles de monnaie électronique'],
        'formalites' => ["Autorisation si le NPI est utilisé (art. 407)", 'Déclaration préalable pour les autres traitements (art. 405)'],
        'attention' => ['Agrégateurs de paiement : contrat de sous-traitance (art. 386)', 'Données saisies hors ligne par les agents : sécurité des téléphones'],
    ],
    [
        'slug' => 'assurance',
        'titre' => 'Assurance',
        'texte' => 'Souscription, sinistres, données de santé des assurés.',
        'traitements' => ['Souscription et gestion des contrats', 'Gestion des sinistres', 'Questionnaires médicaux'],
        'formalites' => ['Autorisation pour les données de santé (art. 394 et 407)', 'Autorisation pour les transferts vers les réassureurs étrangers (art. 391)'],
        'attention' => ["Accès aux données médicales limité aux personnes habilitées (art. 402-403)", 'Durées de conservation par type de contrat'],
    ],
    [
        'slug' => 'telecoms',
        'titre' => 'Télécoms',
        'texte' => 'Abonnés, identification des cartes SIM, données de trafic.',
        'traitements' => ['Identification des abonnés et des cartes SIM', 'Données de trafic et de localisation', 'Prospection par SMS'],
        'formalites' => ['Autorisation pour le NPI (art. 407)', 'DPO obligatoire : suivi à grande échelle (art. 430)', "Analyse d'impact (art. 428)"],
        'attention' => ['Prospection directe : consentement et opposition (art. 332 et 400)', 'Réquisitions des autorités : procédure écrite'],
    ],
    [
        'slug' => 'sante',
        'titre' => 'Santé',
        'texte' => 'Dossier patient, secret médical, recherche en santé.',
        'traitements' => ['Dossier patient', 'Prise de rendez-vous', 'Résultats de laboratoire', 'Recherche en santé'],
        'formalites' => ['Autorisation pour les données de santé (art. 394 et 407)', "Analyse d'impact probable (art. 428)"],
        'attention' => ['Secret médical', 'Pièces spécifiques pour la recherche en santé dans le dossier APDP'],
    ],
    [
        'slug' => 'education',
        'titre' => 'Éducation',
        'texte' => 'Élèves mineurs, résultats, consentement des parents.',
        'traitements' => ['Inscriptions et dossiers scolaires', 'Notes et bulletins', 'Photos et vidéos des élèves', 'Plateformes d\'enseignement en ligne'],
        'formalites' => ['Déclaration préalable (art. 405)', 'Autorisation si la plateforme en ligne est hébergée hors du Bénin (art. 391 et 407)'],
        'attention' => ['Élèves de moins de 18 ans (art. 446)', 'Consentement parental sous 16 ans pour les services en ligne (art. 446)'],
    ],
    [
        'slug' => 'public',
        'titre' => 'Secteur public et communes',
        'texte' => 'DPO obligatoire, état civil, interconnexions de fichiers.',
        'traitements' => ['État civil', 'Fiscalité locale', 'Recensements', 'Gestion des agents'],
        'formalites' => ["Décret en Conseil des ministres après avis motivé de l'APDP (art. 411)", 'DPO obligatoire, mutualisable entre entités publiques (art. 430)'],
        'attention' => ['Interconnexions de fichiers soumises à autorisation (art. 393 et 407)', 'Pas de dispense de déclaration grâce au DPO (art. 408)'],
    ],
    [
        'slug' => 'transport',
        'titre' => 'Transport et tourisme',
        'texte' => 'Fichiers de passagers, réservations, transferts hors du pays.',
        'traitements' => ['Fichiers de passagers', 'Réservations et programmes de fidélité', 'Fiches de police des hôtels'],
        'formalites' => ['Autorisation pour les transferts vers les compagnies et systèmes de réservation étrangers (art. 391 et 407)', 'Déclaration préalable pour les autres traitements (art. 405)'],
        'attention' => ['Copies de passeports : durée de conservation limitée', 'Vidéosurveillance des halls : formulaire « capteurs »'],
    ],
];