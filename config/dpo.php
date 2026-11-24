<?php

/*
|--------------------------------------------------------------------------
| Adresses e-mail de l'éditeur (section 4.5 du cahier des charges)
|--------------------------------------------------------------------------
| L'expéditeur des envois automatiques (notifications@dpo.bj) est réglé
| par MAIL_FROM_ADDRESS dans le fichier .env.
*/

return [

    'emails' => [
        'contact' => env('DPO_EMAIL_CONTACT', 'contact@dpo.bj'),
        'support' => env('DPO_EMAIL_SUPPORT', 'support@dpo.bj'),
        'facturation' => env('DPO_EMAIL_FACTURATION', 'facturation@dpo.bj'),
        'dpo' => env('DPO_EMAIL_DPO', 'dpo@dpo.bj'),
    ],

];