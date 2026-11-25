<?php

namespace App\Filament\Resources\FormationSessions\Schemas;

use App\Models\FormationSession;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class FormationSessionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('formation_id')
                    ->label('Formation')
                    ->relationship('formation', 'titre')
                    ->searchable()
                    ->preload()
                    ->required(),

                // Seuls les utilisateurs qui ont le rôle « formateur » sont proposés
                Select::make('formateur_id')
                    ->label('Formateur')
                    ->relationship('formateur', 'name', fn (Builder $query) => $query->where('role_plateforme', 'formateur'))
                    ->searchable()
                    ->preload(),

                DateTimePicker::make('debut')
                    ->label('Début')
                    ->native(false)
                    ->displayFormat('d/m/Y H:i')
                    ->seconds(false)
                    ->required(),

                DateTimePicker::make('fin')
                    ->label('Fin')
                    ->native(false)
                    ->displayFormat('d/m/Y H:i')
                    ->seconds(false)
                    ->after('debut')
                    ->required(),

                TextInput::make('lien_visio')
                    ->label('Lien de la visio')
                    ->url()
                    ->maxLength(255)
                    ->placeholder('https://…'),

                TextInput::make('places')
                    ->label('Nombre de places')
                    ->numeric()
                    ->minValue(1)
                    ->helperText('Laisser vide pour une session sans limite de places.'),

                Select::make('statut')
                    ->label('Statut')
                    ->options(FormationSession::STATUTS)
                    ->default('planifiee')
                    ->required(),
            ]);
    }
}