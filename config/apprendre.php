<?php

/*
|--------------------------------------------------------------------------
| Académie et Ressources (section 4.1 et onglet « Académie » du cahier des charges)
|--------------------------------------------------------------------------
| Validation : quiz en ligne (règles dans config/academie.php), décision du boss,
| à la place de l'« examen final, 10/20 » prévu dans le cahier.
*/

return [

    'principe' => "Chaque thème part d'une fonction de Sitael : l'apprenant fait l'exercice dans l'outil (remplir une fiche, qualifier un régime, joindre une annexe, déclarer une violation), puis on en tire la règle de droit ou la méthode. Chaque apprenant reçoit un accès en mode formation, avec une organisation fictive.",

    // Les 6 formations du cahier des charges
    'formations' => [
        [
            'code' => 'ADB-DN1',
            'titre' => 'Droit du numérique au Bénin',
            'duree' => '20 h',
            'inspiree' => 'Code du numérique (loi n° 2017-20 modifiée par la loi n° 2020-35)',
            'public' => 'Juristes, DPO et référents données, conformité, audit interne, DSI et RSSI, DRH, consultants, personnes en reconversion',
            'prerequis' => 'Bonnes bases en droit',
            'format' => 'À distance en soirée, regroupements possibles à Cotonou',
            'texte' => "Le module d'entrée du parcours DPO : le Code du numérique, ses institutions, les communications et le commerce électroniques, et le Livre V appliqué sur Sitael.",
            'objectifs' => [
                'Situer le Code du numérique et ses institutions',
                'Maîtriser les règles des communications électroniques et du commerce électronique',
                'Connaître le régime de protection des données et l\'appliquer',
            ],
            'sitael' => "Créer une fiche de traitement hors ligne puis la synchroniser, lire la qualification du régime et l'article cité, photographier un formulaire de collecte pour repérer les mentions manquantes.",
        ],
        [
            'code' => 'ADB-DPO',
            'titre' => 'Métier du délégué à la protection des données (DPO)',
            'duree' => '36 h',
            'inspiree' => 'Cnam DNT105 et séminaire DPO de référence (20 thèmes)',
            'public' => 'Toute personne désignée DPO ou appelée à le devenir, dans le public comme dans le privé',
            'prerequis' => 'Module ADB-DN1 fortement conseillé ; notions de droit, de numérique et de cybersécurité',
            'format' => 'Hybride, regroupements à Cotonou pour les mises en situation',
            'texte' => "Les 20 thèmes du métier de DPO transposés au Livre V, moitié apports, moitié mises en situation sur Sitael : registre, droits, analyses d'impact, violations.",
            'objectifs' => [
                "Mesurer l'impact du Livre V sur l'organisme",
                'Maîtriser les outils et procédures de conformité',
                "Bâtir un plan d'action",
                'Savoir réagir à une demande de droit ou à une violation de données',
            ],
            'sitael' => "La moitié du temps : qualifier le régime de traitements, tenir le registre, traiter une demande de droit au guichet, déclarer une violation, suivre une mise en demeure.",
        ],
        [
            'code' => 'ADB-DCY',
            'titre' => 'Droit de la cybersécurité au Bénin',
            'duree' => '24 h',
            'inspiree' => 'Cnam DNT108, transposé au droit béninois',
            'public' => 'Juristes, DPO, conformité, contrôle interne et audit, DSI et RSSI, DRH, consultants',
            'prerequis' => 'Bonnes bases en droit du numérique (module ADB-DN1 conseillé)',
            'format' => 'À distance, une séance pratique en regroupement à Cotonou',
            'texte' => "Le cadre juridique et les référentiels de la cybersécurité au Bénin et dans la CEDEAO, les régulateurs et les bons réflexes en cas d'intrusion ou de violation.",
            'objectifs' => [
                'Connaître le cadre juridique et les référentiels de la cybersécurité au Bénin et dans la CEDEAO',
                'Comprendre les cybermenaces et identifier les régulateurs',
                "Repérer les cas d'usage et bâtir les plans d'action",
                "Adopter les bons réflexes en cas d'intrusion ou de violation de données",
            ],
            'sitael' => "À chaque séquence : la partie sécurité du formulaire unique et les circuits de signalement vers l'ANSSI-Bénin, l'OCRC, l'APDP et la BCEAO.",
        ],
        [
            'code' => 'ADB-CYB',
            'titre' => 'Cybersécurité : référentiel, objectifs et déploiement',
            'duree' => '24 h',
            'inspiree' => 'Cnam SEC101',
            'public' => 'Informaticiens, administrateurs systèmes et réseaux, RSSI, DPO à profil technique, auditeurs SI',
            'prerequis' => 'Niveau Bac+2 en informatique',
            'format' => 'À distance, exercice de crise en regroupement à Cotonou',
            'texte' => "Analyse de risque, politique de sécurité, mesures et indicateurs, sécurité opérationnelle, avec un exercice de crise.",
            'objectifs' => [
                'Élaborer et défendre une analyse de risque (ISO 27005, EBIOS Risk Manager)',
                'Construire une politique de sécurité et ses indicateurs',
                "Gérer un incident, du signal faible à la crise",
            ],
            'sitael' => "À chaque séance : alertes du tableau de bord et du scanner de site, grille d'analyse d'impact, check-list de sécurité de l'art. 426, registre des violations.",
        ],
        [
            'code' => 'ADB-LCF',
            'titre' => 'Lutte contre la fraude et la criminalité financière',
            'duree' => '20 h + projet',
            'inspiree' => 'Cnam CS8100A ; loi n° 2018-17 modifiée par la loi n° 2020-25',
            'public' => 'Auditeurs, experts-comptables, directions financières, conformité et antifraude des banques, SFD, assurances et monnaie électronique ; enquêteurs et magistrats sur justificatif',
            'prerequis' => "Admission sur dossier (diplôme, CV, lettre de motivation, pièce d'identité)",
            'format' => 'À distance, cas pratiques en regroupement à Cotonou, puis projet tutoré',
            'texte' => "La lutte contre le blanchiment (loi n° 2018-17 modifiée), le rôle de la CENTIF et la fraude au Mobile Money, validée par un projet tutoré.",
            'objectifs' => [
                'Reconnaître les typologies de fraude au Bénin, dont la fraude au Mobile Money',
                'Appliquer les obligations de vigilance de la loi n° 2018-17',
                'Comprendre le rôle de la CENTIF',
            ],
            'sitael' => "À chaque séquence : traitements types antifraude et qualification des traitements imposés par la loi n° 2018-17.",
        ],
        [
            'code' => 'ADB-CPD',
            'titre' => 'Cybersécurité et protection des données',
            'duree' => '44 h',
            'inspiree' => 'Cnam CS12600A',
            'public' => 'Futurs DPO internes ou externes et référents données, avec une double culture juridique et cyber',
            'prerequis' => 'Bac+3/4 de préférence avec expérience, bonnes bases en droit des affaires, bonne familiarité avec le numérique',
            'format' => 'À son rythme, sur un ou deux semestres',
            'texte' => "Un parcours qui réunit les modules ADB-DN1 et ADB-DCY, à suivre à son rythme sur un ou deux semestres.",
            'objectifs' => [
                'Accéder aux fonctions de DPO interne ou externe, ou de référent données',
                'Acquérir une double culture juridique et cyber',
            ],
            'sitael' => 'Celle des modules ADB-DN1 et ADB-DCY.',
        ],
    ],

    // Parcours (cahier des charges, « Parcours et modalités »)
        // Parcours (cahier des charges, « Parcours et modalités »).
    // Chaque formation réussie donne droit à une attestation de formation, pas à un certificat.
    'parcours' => [
        ['nom' => 'Parcours DPO', 'modules' => 'ADB-DN1, puis ADB-DPO avec une épreuve pratique sur Sitael', 'duree' => '56 h'],
        ['nom' => 'Parcours Cybersécurité et protection des données', 'modules' => 'ADB-DN1 + ADB-DCY', 'duree' => '44 h'],
        ['nom' => 'Parcours Lutte contre la fraude', 'modules' => 'ADB-LCF + projet tutoré', 'duree' => '20 h + projet'],
        ['nom' => 'Module seul', 'modules' => 'ADB-CYB ou tout autre module', 'duree' => '20 à 36 h'],
    ],

    'modeles' => [
        "Mentions d'information (art. 415)",
        'Politique de confidentialité',
        'Clause de sous-traitance (art. 386)',
        'Accord entre responsables conjoints (art. 388)',
        'Lettre de désignation du DPO',
        'Charte informatique',
        'Procédure de gestion des droits',
        'Procédure de gestion des violations',
        'Formulaire de consentement',
        "Modèle d'analyse d'impact",
    ],

];