<?php

namespace App\Filament\Resources\Formateurs;

use App\Filament\Resources\Formateurs\Pages\CreateFormateur;
use App\Filament\Resources\Formateurs\Pages\EditFormateur;
use App\Filament\Resources\Formateurs\Pages\ListFormateurs;
use App\Filament\Resources\Formateurs\Schemas\FormateurForm;
use App\Filament\Resources\Formateurs\Tables\FormateursTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FormateurResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'formateurs';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 3;

    // On ne montre que les comptes qui ont le rôle « formateur »
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('role_plateforme', 'formateur');
    }

    // Seul l'admin gère les formateurs
    public static function canViewAny(): bool
    {
        $utilisateur = Auth::user();

        return $utilisateur instanceof User && $utilisateur->estAdmin();
    }
    public static function canCreate(): bool
    {
        return static::canViewAny();
    }

    public static function canEdit(Model $record): bool
    {
        return static::canViewAny();
    }

    // Pas de suppression : on retire le rôle, pour garder l'historique des sessions
    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return FormateurForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormateursTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormateurs::route('/'),
            'create' => CreateFormateur::route('/create'),
            'edit' => EditFormateur::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Académie';
    }

    public static function getModelLabel(): string
    {
        return 'formateur';
    }

    public static function getPluralModelLabel(): string
    {
        return 'formateurs';
    }
}