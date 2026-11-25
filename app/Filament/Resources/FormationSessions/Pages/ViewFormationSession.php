<?php

namespace App\Filament\Resources\FormationSessions\Pages;

use App\Filament\Resources\FormationSessions\FormationSessionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFormationSession extends ViewRecord
{
    protected static string $resource = FormationSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
