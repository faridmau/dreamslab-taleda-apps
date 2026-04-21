<?php

namespace App\Filament\Resources\Attributes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AttributesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key_cam')
                    ->numeric()
                    ->sortable()
                    ->label('ID'),
                TextColumn::make('campo')
                    ->searchable()
                    ->label('Attribute (Internal)'),
                TextColumn::make('campoIt')
                    ->searchable()
                    ->label('Attribute (Italian)'),
                TextColumn::make('campoEn')
                    ->searchable()
                    ->label('Attribute (English)'),
                TextColumn::make('online')
                    ->badge()
                    ->label('Online'),
                TextColumn::make('onlineFiltri')
                    ->badge()
                    ->label('Show in Filters'),
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
