<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Site de test : demande un identifiant et un mot de passe à chaque visiteur,
 * et interdit l'indexation par Google.
 */
class ProtegerRecette
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! config('recette.active')) {
            return $next($request);   // sur ton PC : rien ne change
        }

        $utilisateur = (string) config('recette.utilisateur');
        $motDePasse = (string) config('recette.mot_de_passe');

        // hash_equals compare sans laisser deviner le mot de passe par le temps de réponse
        $autorise = $utilisateur !== '' && $motDePasse !== ''
            && hash_equals($utilisateur, (string) $request->getUser())
            && hash_equals($motDePasse, (string) $request->getPassword());

        if (! $autorise) {
            return response('Site de test dpo.bj : accès réservé.', 401, [
                'WWW-Authenticate' => 'Basic realm="dpo.bj - site de test"',
                'X-Robots-Tag' => 'noindex, nofollow',
            ]);
        }

        $reponse = $next($request);
        $reponse->headers->set('X-Robots-Tag', 'noindex, nofollow');

        return $reponse;
    }
}