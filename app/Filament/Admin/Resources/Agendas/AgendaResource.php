<?php

namespace App\Filament\Admin\Resources\Agendas;

use App\Filament\Admin\Resources\Agendas\Pages\CreateAgenda;
use App\Filament\Admin\Resources\Agendas\Pages\EditAgenda;
use App\Filament\Admin\Resources\Agendas\Pages\ListAgendas;
use App\Filament\Admin\Resources\Agendas\Schemas\AgendaForm;
use App\Filament\Admin\Resources\Agendas\Tables\AgendasTable;
use App\Models\Agenda;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AgendaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgendasTable::configure($table);
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
            'index' => ListAgendas::route('/'),
            'create' => CreateAgenda::route('/create'),
            'edit' => EditAgenda::route('/{record}/edit'),
        ];
    }
}
