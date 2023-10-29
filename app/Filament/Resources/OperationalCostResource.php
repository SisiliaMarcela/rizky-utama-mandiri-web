<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OperationalCostResource\Pages;
use App\Filament\Resources\OperationalCostResource\RelationManagers;
use App\Models\OperationalCost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class OperationalCostResource extends Resource
{
    protected static ?string $model = OperationalCost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('electricity_cost')->prefix('Rp')->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)->numeric()->required()->label('Electricity Cost'),
                Forms\Components\TextInput::make('water_cost')->prefix('Rp')->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)->numeric()->required()->label('Water_cost'),
                Forms\Components\TextInput::make('machine_cost')->prefix('Rp')->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)->numeric()->required()->label('Machine Cost'),
                Forms\Components\TextInput::make('repairation_cost')->prefix('Rp')->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)->numeric()->required()->label('Reparation Cost'),
                Forms\Components\TextInput::make('fuel_cost')->prefix('Rp')->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)->numeric()->required()->label('Fuel Cost'),
                Forms\Components\DatePicker::make('date')->required()->label('date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('electricity_cost')->sortable()->searchable()->money('IDR'),
                Tables\Columns\TextColumn::make('water_cost')->sortable()->searchable()->money('IDR'),
                Tables\Columns\TextColumn::make('machine_cost')->sortable()->searchable()->money('IDR'),
                Tables\Columns\TextColumn::make('repairation_cost')->sortable()->searchable()->money('IDR'),
                Tables\Columns\TextColumn::make('fuel_cost')->sortable()->searchable()->money('IDR'),
                Tables\Columns\TextColumn::make('date')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOperationalCosts::route('/'),
            'create' => Pages\CreateOperationalCost::route('/create'),
            'edit' => Pages\EditOperationalCost::route('/{record}/edit'),
        ];
    }    
}
