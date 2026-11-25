<?php

namespace App\Filament\Resources\Formations\Tables;

use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class FormationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('titre')
            ->columns([
                TextColumn::make('slug')
                    ->label('Code')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => strtoupper($state)),

                TextColumn::make('titre')
                    ->label('Titre')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('duree')
                    ->label('Durée'),

                TextColumn::make('sessions_count')
                    ->label('Sessions')
                    ->counts('sessions'),

                IconColumn::make('active')
                    ->label('Proposée')
                    ->boolean(),
            ])
            ->filters([
                TernaryFilter::make('active')
                    ->label('Proposée sur le site'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ]);
    }
}