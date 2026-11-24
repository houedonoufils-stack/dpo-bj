<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\DemandeContact;
use Illuminate\View\View;

class LegalController extends Controller
{
    /** Page « Mentions légales » (section 4.1 du cahier des charges). */
    public function mentions(): View
    {
        return view('site.mentions', [
            'editeur' => config('editeur'),
        ]);
    }

    /** Page « Politique de confidentialité » conforme au Livre V (section 4.1). */
    public function confidentialite(): View
    {
        return view('site.confidentialite', [
            'editeur' => config('editeur'),
            'emails' => config('dpo.emails'),
            'conservationContact' => DemandeContact::CONSERVATION_ANNEES,
            'dureeSession' => config('session.lifetime'),
        ]);
    }
}