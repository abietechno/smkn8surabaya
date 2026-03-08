<?php

namespace App\Filament\Admin\Resources\MenuLinks\Pages;

use App\Filament\Admin\Resources\MenuLinks\MenuLinkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMenuLink extends EditRecord
{
    protected static string $resource = MenuLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
