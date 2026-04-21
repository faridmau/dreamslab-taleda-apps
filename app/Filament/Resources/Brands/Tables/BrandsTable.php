<?php

namespace App\Filament\Resources\Brands\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BrandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key_bra')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('brand')
                    ->searchable(),
                TextColumn::make('brandEn')
                    ->searchable(),
                TextColumn::make('eliminato')
                    ->badge(),
                TextColumn::make('dataInserimento')
                    ->date('d.m.Y')
                    ->sortable(),
                TextColumn::make('link')
                    ->searchable(),
                TextColumn::make('linkEn')
                    ->searchable(),
                TextColumn::make('visibileMenu')
                    ->badge(),
                TextColumn::make('idGestionale')
                    ->numeric()
                    ->sortable(),
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
