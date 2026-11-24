<?php

/*
|--------------------------------------------------------------------------
| Académie et Ressources (section 4.1 du cahier des charges)
|--------------------------------------------------------------------------
| Intitulés des formations PROVISOIRES : le catalogue reste à finaliser.
*/

return [

    'formations' => [
        ['titre' => 'Les fondamentaux du Livre V', 'public' => 'Tous publics : dirigeants, managers, référents',
         'duree' => '1 jour', 'texte' => 'Champ d\'application, principes, formalités, droits des personnes, sanctions.'],
        ['titre' => 'Réussir ses formalités APDP', 'public' => 'Responsables du traitement, juristes',
         'duree' => '1 jour', 'texte' => 'Déclaration, autorisation, formulaire unique et annexes, suivi des délais.'],
        ['titre' => 'Exercer la fonction de DPO au Bénin', 'public' => 'DPO désignés ou futurs DPO',
         'duree' => '3 jours', 'texte' => 'Missions (art. 432), registre, conseil, contrôle, relations avec l\'APDP, rapport annuel.'],
        ['titre' => "Mener une analyse d'impact (AIPD)", 'public' => 'DPO, chefs de projet',
         'duree' => '1 jour', 'texte' => 'Déclencheurs (art. 428), évaluation des risques, mesures, consultation préalable.'],
        ['titre' => 'Gérer une violation de données', 'public' => 'DPO, équipes informatiques, direction',
         'duree' => '½ journée', 'texte' => 'Détection, qualification, notification sans délai (art. 427), retour d\'expérience.'],
        ['titre' => 'Sécurité des données pour les équipes informatiques', 'public' => 'DSI, administrateurs, développeurs',
         'duree' => '1 jour', 'texte' => 'Mesures de l\'art. 426 : chiffrement, accès, sauvegardes, journalisation, tests.'],
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