<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\Diagnostic;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiagnosticController extends Controller
{
    /** Affiche le questionnaire vide. */
    public function show(): View
    {
        return view('site.diagnostic', [
            'questions' => Diagnostic::QUESTIONS,
        ]);
    }

    /** Reçoit les réponses, calcule et affiche le résultat. Rien n'est enregistré. */
    public function evaluer(Request $request, Diagnostic $diagnostic): View
    {
        // Chaque question doit recevoir « oui » ou « non »
        $regles = [];
        foreach (array_keys(Diagnostic::QUESTIONS) as $cle) {
            $regles["reponses.$cle"] = ['required', 'in:oui,non'];
        }

        $valides = $request->validate($regles);

        return view('site.diagnostic', [
            'questions' => Diagnostic::QUESTIONS,
            'reponses' => $valides['reponses'],
            'resultat' => $diagnostic->evaluer($valides['reponses']),
        ]);
    }
}