<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ApprendreController extends Controller
{
    /** Page « Académie » (section 4.1 du cahier des charges). */
    public function academie(): View
    {
        return view('site.academie', [
            'formations' => config('apprendre.formations'),
        ]);
    }

    /** Page « Ressources et blog » (section 4.1). */
    public function ressources(): View
    {
        return view('site.ressources', [
            'modeles' => config('apprendre.modeles'),
        ]);
    }
}