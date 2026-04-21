<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('brand')
                    ->required(),
                TextInput::make('brandEn')
                    ->required(),
                Select::make('eliminato')
                    ->options(['si' => 'Si', 'no' => 'No'])
                    ->default('no')
                    ->required(),
                DatePicker::make('dataInserimento')
                    ->required(),
                TextInput::make('link')
                    ->required(),
                TextInput::make('linkEn')
                    ->required(),
                Select::make('visibileMenu')
                    ->options(['no' => 'No', 'si' => 'Si', 'top' => 'Top'])
                    ->required(),
                Textarea::make('descrizione')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('descrizioneEn')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('h1')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('h1En')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('metatitle')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('metatitleEn')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('metadescription')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('metadescriptionEn')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('idGestionale')
                    ->required()
                    ->numeric(),
            ]);
    }
}
