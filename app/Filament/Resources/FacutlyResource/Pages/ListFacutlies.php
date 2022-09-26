<?php

namespace App\Filament\Resources\FacutlyResource\Pages;

use App\Filament\Resources\FacutlyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFacutlies extends ListRecords
{
    protected static string $resource = FacutlyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
