<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\FormationSessions\FormationSessionResource;
use App\Models\FormationSession;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class ProchainesSessions extends TableWidget
{
    protected static ?int $sort = 2;

    protected static bool $isLazy = false;

    // Le tableau prend toute la largeur
    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Prochaines sessions';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => FormationSession::query()
                ->with(['formation', 'formateur'])
                ->withCount('inscriptions')
                ->where('statut', 'planifiee')
                ->where('debut', '>=', now())
                ->orderBy('debut')
                ->limit(5))
            ->paginated(false)
            ->columns([
                TextColumn::make('formation.titre')
                    ->label('Formation')
                    ->wrap(),

                TextColumn::make('debut')
                    ->label('Début')
                    ->dateTime('d/m/Y à H:i'),

                TextColumn::make('formateur.name')
                    ->label('Formateur')
                    ->placeholder('Non attribué'),

                TextColumn::make('inscriptions_count')
                    ->label('Inscrits')
                    ->badge(),
            ])
            ->recordUrl(fn (FormationSession $record): string => FormationSessionResource::getUrl('view', ['record' => $record]))
            ->emptyStateHeading('Aucune session programmée')
            ->emptyStateDescription('Les sessions planifiées apparaîtront ici.');
    }
}