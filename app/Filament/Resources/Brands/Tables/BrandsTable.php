<?php

namespace App\Filament\Resources\Brands\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class BrandsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key_bra')
                    ->label('ID')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('brand')
                    ->sortable()
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
                TernaryFilter::make('eliminato')
                    ->label('Status')
                    ->placeholder('All brands')
                    ->trueLabel('Deleted')
                    ->falseLabel('Active'),
                SelectFilter::make('visibileMenu')
                    ->label('Menu Visibility')
                    ->options([
                        'si' => 'Visible',
                        'no' => 'Hidden',
                        'top brand' => 'Top Brand',
                        'brand' => 'Brand',
                    ])
                    ->multiple(),
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
