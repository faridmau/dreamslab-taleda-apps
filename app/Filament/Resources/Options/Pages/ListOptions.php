<?php

namespace App\Filament\Resources\Options\Pages;

use App\Filament\Resources\Options\OptionResource;
use App\Traits\MaxContentWidth;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOptions extends ListRecords
{
    use MaxContentWidth;
    protected static string $resource = OptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
