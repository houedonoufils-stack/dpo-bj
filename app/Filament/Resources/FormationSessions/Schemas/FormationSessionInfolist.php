<?php

namespace App\Filament\Resources\FormationSessions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FormationSessionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('formation.id')
                    ->label('Formation'),
                TextEntry::make('formateur.name')
                    ->label('Formateur')
                    ->placeholder('-'),
                TextEntry::make('debut')
                    ->dateTime(),
                TextEntry::make('fin')
                    ->dateTime(),
                TextEntry::make('lien_visio')
                    ->placeholder('-'),
                TextEntry::make('places')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('statut'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
