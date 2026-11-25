<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TarifsController extends Controller
{
    /** Page « Tarifs » : facturation annuelle uniquement (décision du porteur du projet). */
    public function __invoke(): View
    {
        $moisPayes = 12 - config('tarifs.remise_annuelle_mois');

        $offres = collect(config('tarifs.offres'))->map(function (array $offre) use ($moisPayes) {
            // Prix par an : 12 mois moins les mois offerts ; null = sur devis
            $offre['prix'] = $offre['prix_mensuel'] === null ? null : $offre['prix_mensuel'] * $moisPayes;

            return $offre;
        });

        return view('site.tarifs', [
            'offres' => $offres,
            'tva' => config('tarifs.tva'),
            'moisOfferts' => config('tarifs.remise_annuelle_mois'),
            'essaiJours' => config('tarifs.essai_jours'),
        ]);
    }
}