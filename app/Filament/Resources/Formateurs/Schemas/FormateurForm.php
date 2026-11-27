<?php

namespace App\Filament\Resources\Formateurs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FormateurForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nom et prénom')
                    ->required()
                    ->maxLength(255),

                // Option B : une adresse en majuscules est refusée, avec un message clair
                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->rule('lowercase')
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'lowercase' => "L'adresse e-mail doit être écrite en minuscules.",
                        'unique' => 'Un compte existe déjà avec cette adresse.',
                    ])
                    ->helperText('Un lien lui sera envoyé pour choisir son mot de passe.'),
            ]);
    }
}
