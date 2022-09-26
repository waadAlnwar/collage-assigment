<?php

namespace App\Filament\Resources\DegreeResource\Pages;

use App\Filament\Resources\DegreeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDegree extends EditRecord
{
    protected static string $resource = DegreeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
