<?php

namespace App\Filament\Resources\Products\Schemas;


use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;


class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Information')
                    ->schema([
                        TextEntry::make('nome')
                            ->label('Product Name'),
                        TextEntry::make('codice')
                            ->label('SKU'),
                        TextEntry::make('nomeEn')
                            ->label('Product Name (English)'),
                        TextEntry::make('prezzo')
                            ->numeric()
                            ->label('Price'),
                        TextEntry::make('quantita')
                            ->numeric()
                            ->label('Quantity'),
                        TextEntry::make('online')
                            ->badge()
                            ->label('Online'),
                    ])
                    ->columns(2),
                Section::make('Attributes & Options')
                    ->schema([
                        View::make('components.product-attributes'),
                    ])
                    ->columnSpanFull(),
                Section::make('Details')
                    ->schema([
                        TextEntry::make('modello')
                            ->label('Model (Italian)'),
                        TextEntry::make('descrizione')
                            ->label('Description (Italian)'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
