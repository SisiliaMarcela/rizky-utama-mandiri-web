<?php

namespace App\Filament\Resources\ExcavatorResource\Pages;

use App\Filament\Resources\ExcavatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExcavator extends EditRecord
{
    protected static string $resource = ExcavatorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
