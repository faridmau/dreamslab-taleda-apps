<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('categoria')
                            ->required()
                            ->label('Category (Internal)'),
                        TextInput::make('categoriaEn')
                            ->required()
                            ->label('Category (English)'),
                        Select::make('key_padre')
                            ->relationship('parent', 'categoria')
                            ->label('Parent Category'),
                    ])
                    ->columns(2),
                Section::make('URLs & Links')
                    ->schema([
                        TextInput::make('link')
                            ->required()
                            ->label('Link (Italian)'),
                        TextInput::make('linkEn')
                            ->required()
                            ->label('Link (English)'),
                    ])
                    ->columns(2),
                Section::make('SEO')
                    ->schema([
                        TextInput::make('h1')
                            ->required()
                            ->label('H1 Tag (Italian)'),
                        TextInput::make('h1En')
                            ->required()
                            ->label('H1 Tag (English)'),
                        TextInput::make('metatitle')
                            ->required()
                            ->label('Meta Title (Italian)'),
                        TextInput::make('metatitleEn')
                            ->required()
                            ->label('Meta Title (English)'),
                        Textarea::make('metadescription')
                            ->required()
                            ->label('Meta Description (Italian)'),
                        Textarea::make('metadescriptionEn')
                            ->required()
                            ->label('Meta Description (English)'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Description')
                    ->schema([
                        Textarea::make('descrizione')
                            ->required()
                            ->label('Description (Italian)')
                            ->columnSpanFull(),
                        Textarea::make('descrizioneEn')
                            ->required()
                            ->label('Description (English)')
                            ->columnSpanFull(),
                    ]),
                Section::make('Status & Dates')
                    ->schema([
                        Select::make('online')
                            ->options(['si' => 'Yes', 'no' => 'No'])
                            ->default('si')
                            ->required()
                            ->label('Online'),
                        Select::make('visibileMenu')
                            ->options([
                                'si' => 'Yes',
                                'no' => 'No',
                                'top brand' => 'Top Brand',
                                'brand' => 'Brand',
                            ])
                            ->default('si')
                            ->required()
                            ->label('Menu Visibility'),
                        Select::make('eliminato')
                            ->options(['si' => 'Yes', 'no' => 'No'])
                            ->default('no')
                            ->required()
                            ->label('Deleted'),
                        DatePicker::make('dataInserimento')
                            ->required()
                            ->label('Date Inserted'),
                        TextInput::make('idGestionale')
                            ->numeric()
                            ->label('Gestionale ID'),
                    ])
                    ->columns(3),
            ]);
    }
}
