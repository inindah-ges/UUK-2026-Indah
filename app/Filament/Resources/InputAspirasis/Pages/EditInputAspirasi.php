<?php

namespace App\Filament\Resources\InputAspirasis\Pages;

use App\Filament\Resources\InputAspirasis\InputAspirasiResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditInputAspirasi extends EditRecord
{
    protected static string $resource = InputAspirasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
