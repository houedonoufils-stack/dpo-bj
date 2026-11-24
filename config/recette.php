<?php

/*
|--------------------------------------------------------------------------
| Mode « recette » (site de test, section 4.5 du cahier des charges)
|--------------------------------------------------------------------------
| Accès restreint par mot de passe, non indexé par les moteurs de recherche,
| bandeau d'avertissement. Désactivé par défaut (sur ton PC).
*/

return [
    'active' => (bool) env('RECETTE_ACTIVE', false),
    'utilisateur' => env('RECETTE_UTILISATEUR'),
    'mot_de_passe' => env('RECETTE_MOT_DE_PASSE'),
];