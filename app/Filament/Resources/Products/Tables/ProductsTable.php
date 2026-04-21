<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key_pro')
                    ->numeric()
                    ->sortable()
                    ->label('ID'),
                TextColumn::make('nome')
                    ->searchable()
                    ->sortable()
                    ->label('Product Name'),
                TextColumn::make('codice')
                    ->searchable()
                    ->label('SKU'),
                TextColumn::make('prezzo')
                    ->numeric()
                    ->sortable()
                    ->label('Price'),
                TextColumn::make('quantita')
                    ->numeric()
                    ->sortable()
                    ->label('Quantity'),
                TextColumn::make('online')
                    ->badge()
                    ->label('Online'),
                TextColumn::make('dataInserimento')
                    ->date('d.m.Y')
                    ->sortable()
                    ->label('Date Inserted'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                // EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
