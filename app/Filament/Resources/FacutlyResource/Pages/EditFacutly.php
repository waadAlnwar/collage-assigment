<?php

namespace App\Filament\Resources\FacutlyResource\Pages;

use App\Filament\Resources\FacutlyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFacutly extends EditRecord
{
    protected static string $resource = FacutlyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
