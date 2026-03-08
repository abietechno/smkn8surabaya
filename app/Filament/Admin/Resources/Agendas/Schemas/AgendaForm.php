<?php

namespace App\Filament\Admin\Resources\Agendas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                DateTimePicker::make('date')
                    ->required(),
                TextInput::make('location'),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
