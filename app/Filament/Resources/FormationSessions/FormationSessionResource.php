<?php

namespace App\Filament\Resources\FormationSessions;

use App\Filament\Resources\FormationSessions\Pages\CreateFormationSession;
use App\Filament\Resources\FormationSessions\Pages\EditFormationSession;
use App\Filament\Resources\FormationSessions\Pages\ListFormationSessions;
use App\Filament\Resources\FormationSessions\Pages\ViewFormationSession;
use App\Filament\Resources\FormationSessions\Schemas\FormationSessionForm;
use App\Filament\Resources\FormationSessions\Schemas\FormationSessionInfolist;
use App\Filament\Resources\FormationSessions\Tables\FormationSessionsTable;
use App\Models\FormationSession;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FormationSessionResource extends Resource
{
    protected static ?string $model = FormationSession::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FormationSessionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FormationSessionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormationSessionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\InscriptionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormationSessions::route('/'),
            'create' => CreateFormationSession::route('/create'),
            'view' => ViewFormationSession::route('/{record}'),
            'edit' => EditFormationSession::route('/{record}/edit'),
        ];
    }

        public static function getNavigationGroup(): ?string
    {
        return 'Académie';
    }

    public static function getModelLabel(): string
    {
        return 'session';
    }

    public static function getPluralModelLabel(): string
    {
        return 'sessions';
    }
}
