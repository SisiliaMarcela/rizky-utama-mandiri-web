<?php

namespace App\Filament\Resources\OperationalCostResource\Pages;

use App\Filament\Resources\OperationalCostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOperationalCost extends CreateRecord
{
    protected static string $resource = OperationalCostResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
