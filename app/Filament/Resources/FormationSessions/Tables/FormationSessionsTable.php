<?php

namespace App\Filament\Resources\FormationSessions\Tables;

use App\Models\FormationSession;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FormationSessionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('debut', 'desc')
            ->columns([
                TextColumn::make('formation.titre')
                    ->label('Formation')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('debut')
                    ->label('Début')
                    ->dateTime('d/m/Y à H:i')
                    ->sortable(),

                TextColumn::make('formateur.name')
                    ->label('Formateur')
                    ->placeholder('Non attribué'),

                TextColumn::make('inscriptions_count')
                    ->label('Inscrits')
                    ->counts('inscriptions'),

                TextColumn::make('statut')
                    ->label('Statut')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => FormationSession::STATUTS[$state] ?? $state)
                    ->color(fn (string $state): string => match ($state) {
                        'planifiee' => 'info',
                        'terminee' => 'success',
                        'annulee' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('statut')
                    ->label('Statut')
                    ->options(FormationSession::STATUTS),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}