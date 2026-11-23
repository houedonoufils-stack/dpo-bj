<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LivreVController extends Controller
{
    /** Page « Comprendre le Livre V » (section 4.1 du cahier des charges). */
    public function __invoke(): View
    {
        return view('site.livre-v', [
            'fiches' => config('livre5.fiches'),
            'comparaison' => config('livre5.comparaison'),
        ]);
    }
}