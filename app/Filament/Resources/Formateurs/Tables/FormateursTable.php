<?php

namespace App\Filament\Resources\Formateurs\Tables;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Password;

class FormateursTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Nom et prénom')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),

                TextColumn::make('sessions_animees_count')
                    ->label('Sessions')
                    ->counts('sessionsAnimees'),

                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y'),
            ])
            ->recordActions([
                EditAction::make(),

                Action::make('renvoyerLien')
                    ->label('Renvoyer le lien')
                    ->icon(Heroicon::OutlinedEnvelope)
                    ->requiresConfirmation()
                    ->modalDescription('Un nouveau lien pour choisir son mot de passe sera envoyé à ce formateur.')
                    ->action(function (User $record): void {
                        $statut = Password::broker()->sendResetLink(['email' => $record->email]);

                        $statut === Password::RESET_LINK_SENT
                            ? Notification::make()->title('Lien envoyé.')->success()->send()
                            : Notification::make()->title('Lien non envoyé : réessayez dans une minute.')->warning()->send();
                    }),

                Action::make('retirerRole')
                    ->label('Retirer le rôle')
                    ->icon(Heroicon::OutlinedUserMinus)
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalDescription('Il ne pourra plus entrer dans le back-office. Ses sessions restent enregistrées à son nom.')
                    ->action(function (User $record): void {
                        $record->forceFill(['role_plateforme' => null])->save();

                        Notification::make()->title('Rôle de formateur retiré.')->success()->send();
                    }),
            ]);
    }
}