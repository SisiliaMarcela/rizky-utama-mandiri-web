<?php

namespace App\Filament\Resources;

use App\Enums\ExcavatorStatusEnum;
use App\Filament\Resources\ExcavatorResource\Pages;
use App\Filament\Resources\ExcavatorResource\RelationManagers;
use App\Models\Excavator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ExcavatorResource extends Resource
{
    protected static ?string $model = Excavator::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'unit_name';

    protected static int $globalSearchResultsLimit = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Deskripsi Excavator')->schema([
                        Forms\Components\TextInput::make('unit_name')->required()->label('Name Excavator'),
                        Forms\Components\TextInput::make('brand')->required()->label('Brand'),
                        Forms\Components\TextInput::make('fuel')->required()->label('Fuel'),
                        Forms\Components\TextInput::make('rental_price')->prefix('Rp')->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)->numeric()->label('Rental Price'),
                        Forms\Components\DatePicker::make('date')->required()->label('Date'),
                    ])->columns(1),
                    // Columns ini nandakan dia makan dua columns space
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Status Excavator')->schema([
                        // label('') -> menandakan label dari item nya tidak ada biar nampak rapi  
                        Forms\Components\Select::make('status')->label('')->options([
                            'available' => ExcavatorStatusEnum::AVAILABLE->value,
                            'unavailable' => ExcavatorStatusEnum::UNAVAILABLE->value,
                            'repairing' => ExcavatorStatusEnum::REPAIRING->value
                        ]),
                    ]),
                    Forms\Components\Section::make('Gambar Excavator')->schema([
                        // File upload digunakan untuk tipe data yang mau dimasukkan berbentuk file (dalam project sayang itu gambar)
                        Forms\Components\FileUpload::make('image')->label('')
                    ]),
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make()->schema([
                        Forms\Components\MarkdownEditor::make('unit_description')->columnSpanFull()->label('Unit Excavator'),
                    ])->columns(1), 
                    ]),
               

             
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('unit_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('brand')->sortable(),
                Tables\Columns\TextColumn::make('status')->sortable(),
                Tables\Columns\TextColumn::make('fuel'),
                Tables\Columns\TextColumn::make('rental_price')->sortable()->currency('IDR'),
                Tables\Columns\TextColumn::make('unit_description'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('date')->sortable(),

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
            'index' => Pages\ListExcavators::route('/'),
            'create' => Pages\CreateExcavator::route('/create'),
            'edit' => Pages\EditExcavator::route('/{record}/edit'),
        ];
    }    
}
