<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\MagentoCategory;
use App\Models\MagentoCustomer;
use App\Models\MagentoOrder;
use App\Models\MagentoProduct;
use App\Models\Order;
use App\Models\Product;
use Filament\Widgets\Widget;
use Illuminate\View\View;

class OverviewWidget extends Widget
{
    protected int|string|array $columnSpan = 'full';

    public function render(): View
    {
        $stats = [
            'total_categories' => Category::count(),
            'total_customers' => 0,
            'total_orders' => Order::count(),
            'total_products' => Product::count(),
        ];

        return view('filament.widgets.overview-widget', compact('stats'));
    }
}
