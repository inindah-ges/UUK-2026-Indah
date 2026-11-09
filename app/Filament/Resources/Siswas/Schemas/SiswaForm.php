<?php

namespace App\Filament\Resources\Siswas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
->components([
    TextInput::make('nis')
        ->label('NIS')
        ->required()
        ->integer()
        ->unique(ignoreRecord: true),
    TextInput::make('kelas')
        ->required()
        ->maxLength(10),
]);
    }
}
