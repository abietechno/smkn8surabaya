<?php

namespace App\Filament\Admin\Resources\MenuLinks\Pages;

use App\Filament\Admin\Resources\MenuLinks\MenuLinkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMenuLinks extends ListRecords
{
    protected static string $resource = MenuLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
