<?php

/*
|--------------------------------------------------------------------------
| Académie et Ressources (section 4.1 du cahier des charges)
|--------------------------------------------------------------------------
| Intitulés des formations PROVISOIRES : le catalogue reste à finaliser.
*/

return [

    // Les 6 formations du cahier des charges (onglet « Académie dpo.bj – formations »)
    'formations' => [
        ['code' => 'ADB-DN1', 'titre' => 'Droit du numérique au Bénin', 'duree' => '20 h',
         'public' => 'Juristes, DPO et référents données, conformité, audit interne, DSI et RSSI, DRH, consultants',
         'texte' => "Le module d'entrée du parcours DPO : le Code du numérique, ses institutions, les communications et le commerce électroniques, et le Livre V appliqué sur Sitael."],
        ['code' => 'ADB-DPO', 'titre' => 'Métier du délégué à la protection des données (DPO)', 'duree' => '36 h',
         'public' => 'Toute personne désignée DPO ou appelée à le devenir, dans le public comme dans le privé',
         'texte' => "Les 20 thèmes du métier de DPO transposés au Livre V, moitié apports, moitié mises en situation sur Sitael : registre, droits, analyses d'impact, violations."],
        ['code' => 'ADB-DCY', 'titre' => 'Droit de la cybersécurité au Bénin', 'duree' => '24 h',
         'public' => 'Juristes, DPO, conformité, contrôle interne et audit, DSI et RSSI, DRH, consultants',
         'texte' => "Le cadre juridique et les référentiels de la cybersécurité au Bénin et dans la CEDEAO, les régulateurs et les bons réflexes en cas d'intrusion ou de violation."],
        ['code' => 'ADB-CYB', 'titre' => 'Cybersécurité : référentiel, objectifs et déploiement', 'duree' => '24 h',
         'public' => 'Informaticiens, administrateurs systèmes et réseaux, RSSI, DPO à profil technique, auditeurs SI',
         'texte' => "Analyse de risque, politique de sécurité, mesures et indicateurs, sécurité opérationnelle, avec un exercice de crise."],
        ['code' => 'ADB-LCF', 'titre' => 'Lutte contre la fraude et la criminalité financière', 'duree' => '20 h + projet',
         'public' => 'Auditeurs, experts-comptables, directions financières, conformité et antifraude des banques, SFD, assurances et monnaie électronique',
         'texte' => "La lutte contre le blanchiment (loi n° 2018-17 modifiée), le rôle de la CENTIF et la fraude au Mobile Money, validée par un projet tutoré."],
        ['code' => 'ADB-CPD', 'titre' => 'Cybersécurité et protection des données (certificat)', 'duree' => '44 h',
         'public' => 'Futurs DPO internes ou externes et référents données, avec une double culture juridique et cyber',
         'texte' => "Un certificat qui réunit les modules ADB-DN1 et ADB-DCY, à suivre à son rythme sur un ou deux semestres."],
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