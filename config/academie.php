<?php

/*
|--------------------------------------------------------------------------
| Règles de l'Académie et du quiz (décisions du porteur du projet, 24/11/2026)
|--------------------------------------------------------------------------
| Modifiables après les tests : une ligne à changer, rien d'autre.
*/

return [

    'quiz' => [
        'note_reussite' => 70,              // en pourcentage
        'nombre_questions' => 50,
        'duree_minutes' => 180,             // 3 heures
        'essais_max' => 3,                  // après 3 échecs : nouvelle session obligatoire
        'delai_entre_essais_jours' => 14,   // 2 semaines
        'acces_jours' => 30,                // le quiz reste ouvert 1 mois après la formation
        'conservation_tentatives_mois' => 6,
    ],

    'presence' => [
        'saisie_code_minutes' => 15,        // délai pour saisir le code de présence
    ],

];