<?php

namespace App\Filament\Resources\InputAspirasis\Pages;

use App\Filament\Resources\InputAspirasis\InputAspirasiResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInputAspirasi extends ViewRecord
{
    protected static string $resource = InputAspirasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
