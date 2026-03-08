<?php

namespace App\Filament\Admin\Resources\MenuLinks\Pages;

use App\Filament\Admin\Resources\MenuLinks\MenuLinkResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMenuLink extends CreateRecord
{
    protected static string $resource = MenuLinkResource::class;
}
