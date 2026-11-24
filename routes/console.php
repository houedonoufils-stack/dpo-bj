<?php

use App\Models\TeamInvitation;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    TeamInvitation::query()
        ->whereNotNull('expires_at')
        ->where('expires_at', '<', now())
        ->delete();
})->daily()->description('Delete expired team invitations');

use App\Models\DemandeContact;

// Supprime chaque nuit les demandes de contact de plus de 3 ans (art. 383)
Schedule::command('model:prune', ['--model' => [DemandeContact::class]])->daily();