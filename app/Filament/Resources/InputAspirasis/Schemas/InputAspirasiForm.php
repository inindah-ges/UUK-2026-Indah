<?php

namespace App\Filament\Resources\InputAspirasis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InputAspirasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('nis')
                    ->label('Siswa (NIS)')
                    ->relationship('siswa', 'nis')
                    ->searchable()
                    ->required(),
                Select::make('id_kategori')
                    ->label('Kategori')
                    ->relationship('kategori', 'ket_kategori')
                    ->required(),
                TextInput::make('lokasi')
                    ->required()
                    ->maxLength(50),
                TextInput::make('ket')
                    ->label('Keterangan')
                    ->required()
                    ->maxLength(50),
            ]);
    }
}