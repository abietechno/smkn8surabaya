<?php

namespace App\Filament\Admin\Resources\Galleries\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                \Filament\Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                \Filament\Forms\Components\FileUpload::make('cover_image')
                    ->image()
                    ->directory('galleries')
                    ->required(),
                \Filament\Forms\Components\FileUpload::make('images')
                    ->multiple()
                    ->image()
                    ->directory('galleries')
                    ->panelLayout('grid'),
                \Filament\Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                \Filament\Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
