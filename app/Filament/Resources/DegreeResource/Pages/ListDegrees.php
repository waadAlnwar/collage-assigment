<?php

namespace App\Filament\Resources\DegreeResource\Pages;

use App\Filament\Resources\DegreeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDegrees extends ListRecords
{
    protected static string $resource = DegreeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
