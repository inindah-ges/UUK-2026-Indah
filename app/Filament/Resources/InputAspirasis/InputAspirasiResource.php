<?php

namespace App\Filament\Resources\InputAspirasis;

use App\Filament\Resources\InputAspirasis\Pages\CreateInputAspirasi;
use App\Filament\Resources\InputAspirasis\Pages\EditInputAspirasi;
use App\Filament\Resources\InputAspirasis\Pages\ListInputAspirasis;
use App\Filament\Resources\InputAspirasis\Pages\ViewInputAspirasi;
use App\Filament\Resources\InputAspirasis\Schemas\InputAspirasiForm;
use App\Filament\Resources\InputAspirasis\Schemas\InputAspirasiInfolist;
use App\Filament\Resources\InputAspirasis\Tables\InputAspirasisTable;
use App\Models\InputAspirasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InputAspirasiResource extends Resource
{
    protected static ?string $model = InputAspirasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = "\x18";

    public static function form(Schema $schema): Schema
    {
        return InputAspirasiForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InputAspirasiInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InputAspirasisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInputAspirasis::route('/'),
            'create' => CreateInputAspirasi::route('/create'),
            'view' => ViewInputAspirasi::route('/{record}'),
            'edit' => EditInputAspirasi::route('/{record}/edit'),
        ];
    }
}
