<?php

namespace App\Filament\Resources\InputAspirasis\Pages;

use App\Filament\Resources\InputAspirasis\InputAspirasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInputAspirasis extends ListRecords
{
    protected static string $resource = InputAspirasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
