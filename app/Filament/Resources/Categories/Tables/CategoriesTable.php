<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key_cat')
                    ->numeric()
                    ->sortable()
                    ->label('ID'),
                TextColumn::make('categoria')
                    ->searchable()
                    ->label('Category (Internal)'),
                TextColumn::make('categoriaEn')
                    ->searchable()
                    ->label('Category (English)'),
                TextColumn::make('parent.categoria')
                    ->searchable()
                    ->label('Parent Category'),
                TextColumn::make('online')
                    ->badge()
                    ->label('Online'),
                TextColumn::make('visibileMenu')
                    ->badge()
                    ->label('Menu Visibility'),
                TextColumn::make('dataInserimento')
                    ->date()
                    ->sortable()
                    ->label('Date Inserted'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
