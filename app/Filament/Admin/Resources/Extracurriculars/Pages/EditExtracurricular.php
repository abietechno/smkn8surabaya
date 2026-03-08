<?php

namespace App\Filament\Admin\Resources\Extracurriculars\Pages;

use App\Filament\Admin\Resources\Extracurriculars\ExtracurricularResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExtracurricular extends EditRecord
{
    protected static string $resource = ExtracurricularResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
