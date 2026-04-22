<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
class DiamondSevenOverviewWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        if (! Cache::has('diamond_seven.webstock_stats')) {
            return [
                Stat::make('DiamondSeven', 'No data yet')
                    ->description('Run: php artisan diamond-seven:fetch-webstock')
                    ->color('warning'),
            ];
        }

        $stats = Cache::get('diamond_seven.webstock_stats');

        return [
            Stat::make('Total Articles', $stats['total'])
                ->description('Cached at '.$stats['cached_at']),
            Stat::make('In Stock', $stats['in_stock'])
                ->color('success'),
            Stat::make('Out of Stock', $stats['out_of_stock'])
                ->color('danger'),
        ];
    }
}
