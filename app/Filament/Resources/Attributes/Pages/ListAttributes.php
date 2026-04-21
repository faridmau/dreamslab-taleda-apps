<?php

namespace App\Filament\Resources\Attributes\Pages;

use App\Filament\Resources\Attributes\AttributeResource;
use App\Traits\MaxContentWidth;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAttributes extends ListRecords
{
    use MaxContentWidth;
    protected static string $resource = AttributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }
}
