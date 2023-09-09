<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransferBeverageResource\RelationManagers\BeveragesRelationManager;
use App\Filament\Resources\TransferResource\Pages;
use App\Filament\Resources\TransferResource\RelationManagers;
use App\Models\Transfer;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransferResource extends Resource
{
    protected static ?string $model = Transfer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

                Grid::make(4)
                    ->schema([
                        Grid::make()
                            ->columnSpan(2)
                            ->schema([
                                Select::make('store_from_id')
                                    ->searchable()
                                    ->preload()
                                    ->relationship(name: 'storeFrom', titleAttribute: 'store_name')
                                    ->label('FROM')
                                    ->columnSpanFull(),
                                Select::make('store_to_id')
                                    ->searchable()
                                    ->preload()
                                    ->relationship(name: 'storeTo', titleAttribute: 'store_name')
                                    ->label('TO')
                                    ->columnSpanFull(),
                                DatePicker::make('date')
                                    ->native(false)
                                    ->displayFormat('d/m/Y')
                                    ->label('Date')
                                    ->columnSpanFull(),
                            ]),
                        Grid::make()
                            ->columnSpan(2)
                            ->schema([
                                Repeater::make('transferBeverages')
                                    ->columnSpanFull()
                                    ->relationship()
                                    ->schema([
                                        Select::make('beverage_id')
                                            ->searchable()
                                            ->preload()
                                            ->relationship(name: 'beverage', titleAttribute: 'item_code'),
                                        TextInput::make('quantity')
                                            ->numeric(),
                                    ])
                            ])
                    ]),












            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            BeveragesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransfers::route('/'),
            'create' => Pages\CreateTransfer::route('/create'),
            'edit' => Pages\EditTransfer::route('/{record}/edit'),
        ];
    }
}
