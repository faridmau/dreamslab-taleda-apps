<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Order Information')
                    ->schema([
                        TextInput::make('importo_totale')
                            ->numeric()
                            ->required()
                            ->label('Total Amount'),
                        TextInput::make('importo_scontato')
                            ->numeric()
                            ->label('Discounted Amount'),
                        TextInput::make('importo_dapagare')
                            ->numeric()
                            ->required()
                            ->label('Amount to Pay'),
                        TextInput::make('metodo')
                            ->required()
                            ->label('Payment Method'),
                        Select::make('pagato')
                            ->options(['no' => 'No', 'si' => 'Yes'])
                            ->default('no')
                            ->required()
                            ->label('Paid'),
                        TextInput::make('stato')
                            ->required()
                            ->label('Status'),
                    ])
                    ->columns(2),
                Section::make('Billing Address')
                    ->schema([
                        TextInput::make('nome')
                            ->required()
                            ->label('First Name'),
                        TextInput::make('cognome')
                            ->required()
                            ->label('Last Name'),
                        TextInput::make('via')
                            ->required()
                            ->label('Street'),
                        TextInput::make('civico')
                            ->required()
                            ->label('Street Number'),
                        TextInput::make('cap')
                            ->required()
                            ->label('Postal Code'),
                        TextInput::make('citta')
                            ->required()
                            ->label('City'),
                        TextInput::make('regione')
                            ->required()
                            ->label('Region'),
                        TextInput::make('nazione')
                            ->required()
                            ->label('Country'),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->label('Email'),
                        TextInput::make('telefono')
                            ->tel()
                            ->label('Phone'),
                        TextInput::make('societa')
                            ->label('Company'),
                        TextInput::make('iva')
                            ->label('VAT Number'),
                        TextInput::make('fiscale')
                            ->label('Tax Code'),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
                Section::make('Shipping Address')
                    ->schema([
                        TextInput::make('spednome')
                            ->label('First Name'),
                        TextInput::make('spedcognome')
                            ->label('Last Name'),
                        TextInput::make('spedvia')
                            ->label('Street'),
                        TextInput::make('spedcivico')
                            ->label('Street Number'),
                        TextInput::make('spedcap')
                            ->label('Postal Code'),
                        TextInput::make('spedcitta')
                            ->label('City'),
                        TextInput::make('spedregione')
                            ->label('Region'),
                        TextInput::make('spednazione')
                            ->label('Country'),
                        TextInput::make('spedemail')
                            ->email()
                            ->label('Email'),
                        TextInput::make('spedtelefono')
                            ->tel()
                            ->label('Phone'),
                        TextInput::make('spedazienda')
                            ->label('Company'),
                        TextInput::make('spediva')
                            ->label('VAT Number'),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
