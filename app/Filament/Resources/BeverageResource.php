<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeverageResource\Pages;
use App\Filament\Resources\BeverageResource\RelationManagers;
use App\Models\Beverage;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BeverageResource extends Resource
{
    protected static ?string $model = Beverage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('item_code')
                    // ->unique('beverages')
                    ->unique(ignorable: fn ($record) => $record),

                TextInput::make('item_name'),
                TextInput::make('country'),
                TextInput::make('uom')
                    ->label('UOM')
                    ->required()
                    ->helperText('ตัวอย่างเช่น .xxxx'),
                Select::make('commodity')
                    ->options([
                        'WINE' => 'WINE',
                        'LIQUOR' => 'LIQUOR',
                        'BEER' => 'BEER',
                    ]),
                Select::make('type')
                    ->options([
                        'APERITIF' => 'APERITIF',
                        'RED WINE' => 'RED WINE',
                        'WHITE WINE' => 'WHITE WINE',
                        'CHAMPANGE' => 'CHAMPANGE',
                        'ROSE' => 'ROSE WINE',
                    ]),
                TextInput::make('inv_cost'),
                Select::make('status')
                    ->options([
                        'AVAILABLE' => 'Available',
                        'WAITING_FOR_DEACTIVATE' => 'Waiting for deactivate',
                        'DEACTIVATE' => 'Deactivate',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('item_code')->searchable(),
                TextColumn::make('item_name')->searchable(),
                TextColumn::make('country')->searchable(),
                TextColumn::make('uom')->label('UOM'),
                TextColumn::make('commodity')->sortable(),
                TextColumn::make('type')->sortable(),
                TextColumn::make('inv_cost')->sortable(),
                TextColumn::make('status')->searchable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'AVAILABLE' => 'Available',
                        'WAITING_FOR_DEACTIVATE' => 'Waiting for deactivate',
                        'DEACTIVATE' => 'Deactivate',
                    ]),
                SelectFilter::make('type')
                    ->options([
                        'APERITIF' => 'APERITIF',
                        'RED WINE' => 'RED WINE',
                        'WHITE WINE' => 'WHITE WINE',
                        'CHAMPANGE' => 'CHAMPANGE',
                        'ROSE' => 'ROSE WINE',
                    ])
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBeverages::route('/'),
            'create' => Pages\CreateBeverage::route('/create'),
            'edit' => Pages\EditBeverage::route('/{record}/edit'),
        ];
    }
}
