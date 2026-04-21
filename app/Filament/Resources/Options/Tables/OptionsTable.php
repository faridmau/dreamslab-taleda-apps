<?php

namespace App\Filament\Resources\Options\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key_opz')
                    ->numeric()
                    ->sortable()
                    ->label('ID'),
                TextColumn::make('opzioneIt')
                    ->searchable()
                    ->label('Option (Italian)'),
                TextColumn::make('opzioneEn')
                    ->searchable()
                    ->label('Option (English)'),
                TextColumn::make('attribute.campo')
                    ->searchable()
                    ->label('Attribute'),
                TextColumn::make('dataInserimento')
                    ->date('d.m.Y')
                    ->sortable()
                    ->label('Date Inserted'),
                TextColumn::make('eliminato')
                    ->badge()
                    ->label('Deleted'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
