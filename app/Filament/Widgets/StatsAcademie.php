<?php

namespace App\Filament\Widgets;

use App\Models\DemandeContact;
use App\Models\Formation;
use App\Models\FormationSession;
use App\Models\Inscription;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAcademie extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    // Affiché tout de suite, sans chargement différé
    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        $sessionsAVenir = FormationSession::query()
            ->where('statut', 'planifiee')
            ->where('debut', '>=', now());

        $inscrits = Inscription::query()
            ->where('statut', '!=', 'annule')
            ->whereHas('session', fn ($q) => $q->where('statut', 'planifiee')->where('debut', '>=', now()))
            ->count();

        return [
            Stat::make('Formations proposées', Formation::where('active', true)->count())
                ->description('Au catalogue de l\'Académie')
                ->descriptionIcon(Heroicon::OutlinedAcademicCap)
                ->color('primary'),

            Stat::make('Sessions à venir', $sessionsAVenir->count())
                ->description('Planifiées, pas encore commencées')
                ->descriptionIcon(Heroicon::OutlinedCalendarDays)
                ->color('info'),

            Stat::make('Inscrits', $inscrits)
                ->description('Aux sessions à venir')
                ->descriptionIcon(Heroicon::OutlinedUserGroup)
                ->color('success'),

            Stat::make('Demandes de contact', DemandeContact::where('created_at', '>=', now()->subDays(30))->count())
                ->description('Ces 30 derniers jours')
                ->descriptionIcon(Heroicon::OutlinedEnvelope)
                ->color('warning'),
        ];
    }
}