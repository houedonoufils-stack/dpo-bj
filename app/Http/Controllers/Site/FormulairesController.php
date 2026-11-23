<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FormulairesController extends Controller
{
    /** Bibliothèque des formulaires APDP, avec recherche (section 3.14). */
    public function __invoke(Request $request): View
    {
        // Le texte recherché, limité à 100 caractères
        $q = Str::limit(trim((string) $request->query('q', '')), 100, '');

        $formulaires = collect(config('formulaires.liste'))
            // Le fichier est-il vraiment présent dans public/formulaires ?
            ->map(function (array $formulaire) {
                $formulaire['telechargeable'] = $formulaire['fichier'] !== null
                    && file_exists(public_path('formulaires/'.$formulaire['fichier']));

                return $formulaire;
            });

        if ($q !== '') {
            // Recherche sans tenir compte des majuscules ni des accents
            $cherche = Str::lower(Str::ascii($q));

            $formulaires = $formulaires->filter(function (array $formulaire) use ($cherche) {
                $texte = $formulaire['titre'].' '.$formulaire['contenu'].' '.$formulaire['requis'].' '.$formulaire['categorie'];

                return Str::contains(Str::lower(Str::ascii($texte)), $cherche);
            });
        }

        return view('site.formulaires', [
            'formulaires' => $formulaires,
            'total' => count(config('formulaires.liste')),
            'q' => $q,
            'source' => config('formulaires.source'),
            'releveLe' => config('formulaires.releve_le'),
        ]);
    }
}