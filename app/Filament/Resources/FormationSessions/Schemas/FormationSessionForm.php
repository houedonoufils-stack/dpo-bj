<?php

namespace App\Filament\Resources\FormationSessions\Schemas;

use App\Models\FormationSession;
use Closure;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
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
                    ->required()
                    ->rules([self::pasDeChevauchement('formation_id', 'Cette formation a déjà une session sur ce créneau.')]),

                Select::make('formateur_id')
                    ->label('Formateur')
                    ->relationship('formateur', 'name', fn (Builder $query) => $query->where('role_plateforme', 'formateur'))
                    ->searchable()
                    ->preload()
                    ->rules([self::pasDeChevauchement('formateur_id', 'Ce formateur a déjà une session sur ce créneau.')]),

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
                    ->placeholder('https://…')
                    ->rules([self::pasDeChevauchement('lien_visio', 'Ce lien de visio est déjà utilisé sur ce créneau.')]),

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

    /**
     * Règle de validation : refuse la valeur si une autre session, sur un créneau
     * qui chevauche celui-ci, a déjà la même valeur dans cette colonne.
     */
    private static function pasDeChevauchement(string $colonne, string $message): Closure
    {
        return fn (Get $get, ?FormationSession $record): Closure => function (string $attribute, mixed $value, Closure $fail) use ($get, $record, $colonne, $message): void {
            // Rien à comparer : champ vide, dates manquantes, ou session annulée
            if (blank($value) || blank($get('debut')) || blank($get('fin')) || $get('statut') === 'annulee') {
                return;
            }

            $conflit = FormationSession::surLeCreneau($get('debut'), $get('fin'), $record?->getKey())
                ->where($colonne, $value)
                ->exists();

            if ($conflit) {
                $fail($message);
            }
        };
    }
}