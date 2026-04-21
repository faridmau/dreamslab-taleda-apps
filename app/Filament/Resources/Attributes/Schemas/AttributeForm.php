<?php

namespace App\Filament\Resources\Attributes\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AttributeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('campo')
                    ->required()
                    ->label('Attribute (Internal)'),
                TextInput::make('campoIt')
                    ->required()
                    ->label('Attribute (Italian)'),
                TextInput::make('campoEn')
                    ->required()
                    ->label('Attribute (English)'),
                Select::make('online')
                    ->options(['si' => 'Yes', 'no' => 'No'])
                    ->default('si')
                    ->required()
                    ->label('Online'),
                Select::make('onlineFiltri')
                    ->options(['si' => 'Yes', 'no' => 'No'])
                    ->default('si')
                    ->required()
                    ->label('Show in Filters'),
                DatePicker::make('dataInserimento')
                    ->required()
                    ->label('Date Inserted'),
                Select::make('eliminato')
                    ->options(['si' => 'Yes', 'no' => 'No'])
                    ->default('no')
                    ->required()
                    ->label('Deleted'),
                TextInput::make('idGestionale')
                    ->numeric()
                    ->label('Gestionale ID'),
            ]);
    }
}
