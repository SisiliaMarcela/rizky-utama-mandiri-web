<?php

namespace App\Filament\Resources\ExcavatorResource\Pages;

use App\Filament\Resources\ExcavatorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExcavator extends CreateRecord
{
    protected static string $resource = ExcavatorResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
