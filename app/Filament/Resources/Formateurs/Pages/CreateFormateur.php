<?php

namespace App\Filament\Resources\Formateurs\Pages;

use App\Filament\Resources\Formateurs\FormateurResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Actions\Teams\CreateTeam;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use App\Notifications\InvitationFormateur;

class CreateFormateur extends CreateRecord
{
    protected static string $resource = FormateurResource::class;

        protected function handleRecordCreation(array $data): Model
    {
        // Tout ou rien : si une étape échoue, rien n'est enregistré
        $formateur = DB::transaction(function () use ($data) {
            $formateur = new User();

            // forceFill : le rôle n'est jamais rempli par le formulaire, mais par le code
            $formateur->forceFill([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Str::random(40),   // mot de passe aléatoire que personne ne connaît
                'role_plateforme' => 'formateur',
                'email_verified_at' => now(),    // l'adresse est confirmée par l'admin
            ])->save();

            // Comme à l'inscription : un espace personnel, pour pouvoir entrer dans Sitael
            app(CreateTeam::class)->handle($formateur, 'Espace de '.$formateur->name, isPersonal: true);

            return $formateur;
        });

        // Le formateur choisit lui-même son mot de passe grâce au lien de l'invitation
        $formateur->notify(new InvitationFormateur($formateur->creerJetonMotDePasse()));

        return $formateur;
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Formateur créé. Un lien lui a été envoyé pour choisir son mot de passe.';
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}