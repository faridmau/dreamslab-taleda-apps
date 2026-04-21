<?php

namespace App\Filament\Resources\Options\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('key_cam')
                    ->relationship('attribute', 'campo')
                    ->required()
                    ->label('Attribute'),
                TextInput::make('opzioneIt')
                    ->required()
                    ->label('Option (Italian)'),
                TextInput::make('opzioneEn')
                    ->required()
                    ->label('Option (English)'),
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
