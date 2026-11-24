<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Prévient l'équipe dpo.bj qu'une demande de contact est arrivée.
 *
 * Contenu NEUTRE, sans donnée personnelle (ni nom, ni e-mail, ni message) :
 * tant que le prestataire d'e-mail n'est pas choisi et son flux autorisé
 * (sections 5 et 5.1 du cahier, art. 391 et 407), rien ne doit sortir du Bénin.
 * Le détail se consulte dans le back-office.
 */
class NouvelleDemandeContact extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public int $numero,
        public string $objet,
        public string $recueLe,
    ) {}

    /** Les canaux d'envoi : ici l'e-mail. SMS et WhatsApp viendront plus tard. */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Nouvelle demande de contact n° {$this->numero}")
            ->greeting('Bonjour,')
            ->line("Une nouvelle demande de contact est arrivée sur le site dpo.bj.")
            ->line("Numéro : {$this->numero}")
            ->line("Objet : {$this->objet}")
            ->line("Reçue le : {$this->recueLe}")
            ->line('Par sécurité, ce message ne contient aucune donnée personnelle. Consultez le détail dans le back-office.')
            ->salutation('dpo.bj · notifications automatiques');
    }
}