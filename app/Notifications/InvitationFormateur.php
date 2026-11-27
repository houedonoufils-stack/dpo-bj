<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * E-mail envoyé à un formateur créé par l'admin : il choisit lui-même son mot de passe.
 * Contenu neutre : aucune donnée personnelle, seulement le lien.
 */
class InvitationFormateur extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public string $jeton) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $lien = route('password.reset', [
            'token' => $this->jeton,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);

        $minutes = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');

        return (new MailMessage)
            ->subject('Votre accès formateur au back-office dpo.bj')
            ->greeting('Bonjour,')
            ->line("Un compte formateur vient d'être créé pour vous sur le back-office de l'Académie dpo.bj.")
            ->line('Pour l\'activer, choisissez votre mot de passe :')
            ->action('Choisir mon mot de passe', $lien)
            ->line("Ce lien est valable {$minutes} minutes. Passé ce délai, demandez un nouveau lien à l'administrateur.")
            ->line("Si vous n'attendiez pas ce message, ignorez-le simplement.")
            ->salutation("L'équipe dpo.bj");
    }
}