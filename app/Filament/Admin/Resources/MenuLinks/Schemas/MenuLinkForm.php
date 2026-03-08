<?php

namespace App\Filament\Admin\Resources\MenuLinks\Schemas;

use App\Models\MenuLink;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('parent_id')
                    ->label('Parent Menu')
                    ->placeholder('Kosongkan jika menu utama')
                    ->options(fn () => MenuLink::whereNull('parent_id')
                        ->where('group', 'navbar')
                        ->pluck('label', 'id'))
                    ->searchable()
                    ->nullable(),
                TextInput::make('label')
                    ->required(),
                TextInput::make('url')
                    ->required(),
                Textarea::make('description')
                    ->label('Deskripsi (untuk mega menu)')
                    ->rows(2)
                    ->nullable(),
                TextInput::make('icon')
                    ->label('Icon (opsional)')
                    ->placeholder('e.g. globe, phone, server')
                    ->nullable(),
                Select::make('group')
                    ->options([
                        'navbar' => 'Navbar',
                        'footer' => 'Footer',
                    ])
                    ->required()
                    ->default('navbar'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }
}
