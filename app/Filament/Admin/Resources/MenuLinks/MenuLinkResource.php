<?php

namespace App\Filament\Admin\Resources\MenuLinks;

use App\Filament\Admin\Resources\MenuLinks\Pages\CreateMenuLink;
use App\Filament\Admin\Resources\MenuLinks\Pages\EditMenuLink;
use App\Filament\Admin\Resources\MenuLinks\Pages\ListMenuLinks;
use App\Filament\Admin\Resources\MenuLinks\Schemas\MenuLinkForm;
use App\Filament\Admin\Resources\MenuLinks\Tables\MenuLinksTable;
use App\Models\MenuLink;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MenuLinkResource extends Resource
{
    protected static ?string $model = MenuLink::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBars3;

    protected static ?string $navigationLabel = 'Menu Links';

    public static function form(Schema $schema): Schema
    {
        return MenuLinkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MenuLinksTable::configure($table);
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
            'index' => ListMenuLinks::route('/'),
            'create' => CreateMenuLink::route('/create'),
            'edit' => EditMenuLink::route('/{record}/edit'),
        ];
    }
}
