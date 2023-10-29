<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OperationalCostResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOperationalCost extends BaseWidget
{
    protected static ?int $sort =4;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                OperationalCostResource::getEloquentQuery()
            )->defaultPaginationPageOption(5)
            ->columns([
                Tables\Columns\TextColumn::make('electricity_cost')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('water_cost')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('machine_cost')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('repairation_cost')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('fuel_cost')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('date')->sortable()->searchable(),
            ]);
    }
}
