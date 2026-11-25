<?php

namespace App\Filament\Resources\FormationSessions\RelationManagers;

use App\Models\Inscription;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Validation\Rules\Unique;

class InscriptionsRelationManager extends RelationManager
{
    protected static string $relationship = 'inscriptions';

    protected static ?string $title = 'Inscriptions';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nom')
                    ->label('Nom et prénom')
                    ->required()
                    ->maxLength(150),

                // Une même adresse ne peut être inscrite qu'une fois à la même session
                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required()
                    ->maxLength(190)
                    ->unique(
                        ignoreRecord: true,
                        modifyRuleUsing: fn (Unique $rule) => $rule->where('formation_session_id', $this->getOwnerRecord()->getKey()),
                    ),

                Select::make('statut')
                    ->label('Statut')
                    ->options(Inscription::STATUTS)
                    ->default('inscrit')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nom')
            ->columns([
                TextColumn::make('nom')
                    ->label('Nom et prénom')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),

                TextColumn::make('statut')
                    ->label('Statut')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => Inscription::STATUTS[$state] ?? $state)
                    ->color(fn (string $state): string => match ($state) {
                        'present' => 'success',
                        'absent', 'annule' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Inscrit le')
                    ->dateTime('d/m/Y'),
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}