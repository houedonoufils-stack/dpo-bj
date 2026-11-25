<?php

namespace App\Filament\Resources\Formations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FormationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('titre')
                    ->label('Titre'),

                TextEntry::make('slug')
                    ->label('Code')
                    ->formatStateUsing(fn (string $state): string => strtoupper($state)),

                TextEntry::make('public')
                    ->label('Public visé')
                    ->placeholder('Non renseigné'),

                TextEntry::make('duree')
                    ->label('Durée')
                    ->placeholder('Non renseignée'),

                TextEntry::make('description')
                    ->label('Description')
                    ->placeholder('Non renseignée')
                    ->columnSpanFull(),

                IconEntry::make('active')
                    ->label('Proposée sur le site')
                    ->boolean(),
            ]);
    }
}