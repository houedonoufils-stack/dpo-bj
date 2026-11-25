<?php

namespace App\Filament\Resources\Formations\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FormationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titre')
                    ->label('Titre')
                    ->required()
                    ->maxLength(200),

                TextInput::make('slug')
                    ->label('Code')
                    ->helperText('En minuscules, avec des tirets. Exemple : adb-dpo.')
                    ->required()
                    ->alphaDash()
                    ->maxLength(50)
                    ->unique(ignoreRecord: true),

                TextInput::make('public')
                    ->label('Public visé')
                    ->maxLength(200),

                TextInput::make('duree')
                    ->label('Durée')
                    ->placeholder('Exemple : 36 h')
                    ->maxLength(50),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(4)
                    ->columnSpanFull(),

                Toggle::make('active')
                    ->label('Formation proposée sur le site')
                    ->default(true),
            ]);
    }
}