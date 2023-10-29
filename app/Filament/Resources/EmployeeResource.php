<?php

namespace App\Filament\Resources;

use App\Enums\EmployeeStatusEnum;
use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('employee_name')->required()->label('Employee Name'),
                Forms\Components\TextInput::make('jobdesk')->required()->label('Jobdesk'),
                Forms\Components\TextInput::make('phone_number')->required()->label('Phone Number'),
                Forms\Components\TextInput::make('address')->required()->label('Address'),
                Forms\Components\Select::make('employee_status')->required()->label('Employee Status')->options([
                    'part_time' => EmployeeStatusEnum::PART_TIME->value,
                    'full_time' => EmployeeStatusEnum::FULL_TIME->value,
                    'replacement' => EmployeeStatusEnum::REPLACEMENT->value,
                ]),
                Forms\Components\TextInput::make('employee_salary')->prefix('Rp')->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)->numeric()->required()->label('Employee Salary'),
                Forms\Components\DatePicker::make('join_date')->required()->label('Join Date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('employee_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jobdesk')->sortable(),
                Tables\Columns\TextColumn::make('employee_status')->sortable(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }    
}
