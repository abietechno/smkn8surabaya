<?php

namespace App\Filament\Admin\Resources\Extracurriculars\Pages;

use App\Filament\Admin\Resources\Extracurriculars\ExtracurricularResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExtracurriculars extends ListRecords
{
    protected static string $resource = ExtracurricularResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
