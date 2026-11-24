<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\DemandeContact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Notifications\NouvelleDemandeContact;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /** Affiche le formulaire de contact. */
    public function show(): View
    {
        return view('site.contact', [
            'objets' => DemandeContact::OBJETS,
            'texteConsentement' => DemandeContact::TEXTE_CONSENTEMENT,
            'conservation' => DemandeContact::CONSERVATION_ANNEES,
        ]);
    }

    /** Reçoit, vérifie et enregistre une demande. */
    public function envoyer(Request $request): RedirectResponse
    {
        $merci = "Merci, votre demande a bien été envoyée. Nous vous répondons sous 48 h ouvrées.";

        // Champ piège : invisible pour un humain, rempli par les robots.
        // On fait semblant que tout va bien, mais on n'enregistre rien.
        if ($request->filled('site_web')) {
            return redirect()->route('site.contact')->with('succes', $merci);
        }

        // On retire les espaces du téléphone : « 01 97 00 00 00 » devient « 0197000000»
        if ($request->filled('telephone')) {
            $request->merge(['telephone' => preg_replace('/\s+/', '', $request->input('telephone'))]);
        }

        $valides = $request->validate([
            'nom' => ['required', 'string', 'max:150'],
            'organisation' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:190'],
            // Numéro béninois : 10 chiffres commençant par 01, avec ou sans +229 (section 5)
            'telephone' => ['nullable', 'regex:/^(\+229)?01\d{8}$/'],
            'objet' => ['required', Rule::in(array_keys(DemandeContact::OBJETS))],
            'message' => ['nullable', 'string', 'max:3000'],
            'consentement' => ['nullable', 'boolean'],
        ], [
            'telephone.regex' => 'Le numéro doit compter 10 chiffres et commencer par 01, par exemple 01 97 00 00 00.',
        ], [
            'nom' => 'nom et prénom',
            'email' => 'e-mail professionnel',
        ]);

        $consentement = $request->boolean('consentement');

        $demande = DemandeContact::create([
            'nom' => $valides['nom'],
            'organisation' => $valides['organisation'],
            'email' => $valides['email'],
            'telephone' => $valides['telephone'] ?? null,
            'objet' => $valides['objet'],
            'message' => $valides['message'] ?? null,
            'consentement_prospection' => $consentement,
            'consentement_texte' => $consentement ? DemandeContact::TEXTE_CONSENTEMENT : null,
            'consentement_le' => $consentement ? now() : null,
        ]);

            // Prévenir l'équipe dpo.bj (envoi en file d'attente, contenu neutre)
        Notification::route('mail', config('dpo.emails.contact'))
            ->notify(new NouvelleDemandeContact(
                numero: $demande->id,
                objet: DemandeContact::OBJETS[$demande->objet],
                recueLe: $demande->created_at->format('d/m/Y à H:i'),
            ));

        // Après un envoi réussi, on redirige : un rafraîchissement de la page ne renverra pas le formulaire
        return redirect()->route('site.contact')->with('succes', $merci);
    }
}