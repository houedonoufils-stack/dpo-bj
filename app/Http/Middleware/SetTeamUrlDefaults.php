<?php

namespace App\Http\Middleware;

use App\Actions\Teams\CreateTeam;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SetTeamUrlDefaults
{
    public function __construct(private CreateTeam $createTeam)
    {
        //
    }

    /**
     * Set the default URL parameters for team-based routes.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Sécurité : un compte sans espace (par exemple créé depuis le back-office)
        // en reçoit un, comme à l'inscription, au lieu de provoquer une erreur 500.
        if ($user instanceof User && ! $user->currentTeam) {
            $this->createTeam->handle($user, 'Espace de '.$user->name, isPersonal: true);
            $user->refresh();
        }

        if ($currentTeam = $user?->currentTeam) {
            URL::defaults([
                'current_team' => $currentTeam->slug,
                'team' => $currentTeam->slug,
            ]);
        }

        return $next($request);
    }
}