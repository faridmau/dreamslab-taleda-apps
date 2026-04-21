<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key_ord')
                    ->numeric()
                    ->sortable()
                    ->label('Order ID'),
                TextColumn::make('nome')
                    ->searchable()
                    ->label('First Name'),
                TextColumn::make('cognome')
                    ->searchable()
                    ->label('Last Name'),
                TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                TextColumn::make('importo_totale')

                    ->label('Total Amount'),
                BadgeColumn::make('pagato')
                    ->colors(['no' => 'danger', 'si' => 'success'])
                    ->label('Paid'),
                TextColumn::make('data_ord')
                    ->dateTime()
                    ->sortable()
                    ->label('Order Date'),
                TextColumn::make('stato')
                    ->badge()
                    ->label('Status'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
