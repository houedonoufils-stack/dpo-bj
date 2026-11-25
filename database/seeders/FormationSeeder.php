<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FormationSeeder extends Seeder
{
    /**
     * Crée les 6 formations de l'Académie (cahier des charges, onglet « Académie dpo.bj – formations »).
     * Les formations sont décrites dans config/apprendre.php.
     * On peut relancer la commande sans créer de doublons.
     */
    public function run(): void
    {
        foreach (config('apprendre.formations') as $formation) {
            Formation::updateOrCreate(
                ['slug' => Str::slug($formation['code'])],    // ex. « adb-dn1 » : le code officiel ne change pas
                [
                    'titre' => $formation['titre'],
                    'public' => $formation['public'],
                    'duree' => $formation['duree'],
                    'description' => $formation['texte'],
                    'active' => true,
                ],
            );
        }
    }
}