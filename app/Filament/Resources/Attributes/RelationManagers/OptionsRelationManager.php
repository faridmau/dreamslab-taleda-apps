<?php

namespace App\Filament\Resources\Attributes\RelationManagers;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OptionsRelationManager extends RelationManager
{
    protected static string $relationship = 'options';

    protected static ?string $recordTitleAttribute = 'opzioneIt';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('opzioneIt')
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
                // DeleteAction::make(),
            ])
            ->toolbarActions([
                // CreateAction::make(),
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
