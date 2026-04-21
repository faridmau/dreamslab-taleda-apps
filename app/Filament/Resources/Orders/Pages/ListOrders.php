<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use App\Traits\MaxContentWidth;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    use MaxContentWidth;
    protected static string $resource = OrderResource::class;
}
