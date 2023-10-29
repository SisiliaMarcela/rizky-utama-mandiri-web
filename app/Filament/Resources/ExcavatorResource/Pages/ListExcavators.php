<?php

namespace App\Filament\Resources\ExcavatorResource\Pages;

use App\Filament\Resources\ExcavatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExcavators extends ListRecords
{
    protected static string $resource = ExcavatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
