<?php

namespace App\Filament\Resources\InputAspirasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InputAspirasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis')->label('NIS')->searchable(),
                TextColumn::make('siswa.kelas')->label('Kelas'),
                TextColumn::make('kategori.ket_kategori')->label('Kategori'),
                TextColumn::make('lokasi')->searchable(),
                TextColumn::make('ket')->label('Keterangan'),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}