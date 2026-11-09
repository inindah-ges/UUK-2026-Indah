<?php

namespace App\Filament\Resources\Aspirasis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_pelaporan')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(['Menunggu' => 'Menunggu', 'Proses' => 'Proses', 'Selesai' => 'Selesai'])
                    ->default('Menunggu')
                    ->required(),
                TextInput::make('id_kategori')
                    ->required()
                    ->numeric(),
                Textarea::make('feedback')
                    ->columnSpanFull(),
            ]);
    }
}
