<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('nome')
                            ->required()
                            ->label('Product Name'),
                        TextInput::make('codice')
                            ->required()
                            ->label('SKU'),
                        TextInput::make('nomeEn')
                            ->required()
                            ->label('Product Name (English)'),
                    ])
                    ->columns(2),
                Section::make('Pricing & Stock')
                    ->schema([
                        TextInput::make('prezzo')
                            ->numeric()
                            ->required()
                            ->label('Price'),
                        TextInput::make('prezzo_sconto')
                            ->numeric()
                            ->label('Discounted Price'),
                        TextInput::make('percentualeSconto')
                            ->numeric()
                            ->label('Discount Percentage'),
                        TextInput::make('quantita')
                            ->numeric()
                            ->required()
                            ->label('Quantity'),
                    ])
                    ->columns(2),
                Section::make('Details')
                    ->schema([
                        Textarea::make('modello')
                            ->label('Model (Italian)'),
                        Textarea::make('modelloEn')
                            ->label('Model (English)'),
                        Textarea::make('descrizione')
                            ->label('Description (Italian)'),
                        Textarea::make('descrizioneEn')
                            ->label('Description (English)'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Status & Dates')
                    ->schema([
                        Select::make('online')
                            ->options(['si' => 'Yes', 'no' => 'No'])
                            ->default('no')
                            ->required()
                            ->label('Online'),
                        Select::make('inEvidenza')
                            ->options(['si' => 'Yes', 'no' => 'No'])
                            ->default('no')
                            ->label('Featured'),
                        Select::make('ultimoArrivo')
                            ->options(['si' => 'Yes', 'no' => 'No'])
                            ->default('no')
                            ->label('Latest Arrival'),
                        Select::make('eliminato')
                            ->options(['si' => 'Yes', 'no' => 'No'])
                            ->default('no')
                            ->label('Deleted'),
                        DatePicker::make('dataInserimento')
                            ->required()
                            ->label('Date Inserted'),
                    ])
                    ->columns(3),
            ]);
    }
}
