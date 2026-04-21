<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BrandInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('key_bra')
                    ->numeric(),
                TextEntry::make('brand'),
                TextEntry::make('brandEn'),
                TextEntry::make('eliminato')
                    ->badge(),
                TextEntry::make('dataInserimento')
                    ->date('d.m.Y'),
                TextEntry::make('link'),
                TextEntry::make('linkEn'),
                TextEntry::make('visibileMenu')
                    ->badge(),
                TextEntry::make('descrizione')
                    ->columnSpanFull(),
                TextEntry::make('descrizioneEn')
                    ->columnSpanFull(),
                TextEntry::make('h1')
                    ->columnSpanFull(),
                TextEntry::make('h1En')
                    ->columnSpanFull(),
                TextEntry::make('metatitle')
                    ->columnSpanFull(),
                TextEntry::make('metatitleEn')
                    ->columnSpanFull(),
                TextEntry::make('metadescription')
                    ->columnSpanFull(),
                TextEntry::make('metadescriptionEn')
                    ->columnSpanFull(),
                TextEntry::make('idGestionale')
                    ->numeric(),
            ]);
    }
}
