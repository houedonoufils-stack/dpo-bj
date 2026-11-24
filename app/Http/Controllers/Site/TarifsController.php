<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TarifsController extends Controller
{
    /** Page « Tarifs » (section 4.2 du cahier des charges). */
    public function __invoke(Request $request): View
    {
        $annuel = $request->query('facturation') === 'annuelle';
        $moisPayes = 12 - config('tarifs.remise_annuelle_mois');

        $offres = collect(config('tarifs.offres'))->map(function (array $offre) use ($annuel, $moisPayes) {
            if ($offre['prix_mensuel'] === null) {
                $offre['prix'] = null;           // sur devis
            } else {
                $offre['prix'] = $annuel
                    ? $offre['prix_mensuel'] * $moisPayes   // prix par an
                    : $offre['prix_mensuel'];               // prix par mois
            }

            return $offre;
        });

        return view('site.tarifs', [
            'offres' => $offres,
            'annuel' => $annuel,
            'tva' => config('tarifs.tva'),
            'moisOfferts' => config('tarifs.remise_annuelle_mois'),
            'essaiJours' => config('tarifs.essai_jours'),
        ]);
    }
}