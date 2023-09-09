<?php

namespace App\Filament\Resources\TransferBeverageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BeveragesRelationManager extends RelationManager
{
    protected static string $relationship = 'beverages';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('item_name')
            ->columns([
                TextColumn::make('item_name'),
                TextColumn::make('quantity'),
                TextColumn::make('amount'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                
            ])
            ->actions([
             
                Tables\Actions\DeleteAction::make(),
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
}
