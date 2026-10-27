<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\BlogPostsChart;
use App\Filament\Widgets\CustomerGrowth;
use App\Filament\Widgets\CustomerSegments;
use App\Filament\Widgets\FlaggedOrders;
use App\Filament\Widgets\OrderValueDistribution;
use App\Filament\Widgets\ProductMarginAnalysis;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\TopProductsbyRevenue;
use Filament\Pages\Page;
use Filament\Widgets\Widget;

class ShopDashboard extends Page
{
    // protected string $view = 'filament.pages.shop-dashboard';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Shop Dashboard';

    protected static ?string $title = 'Shop Dashboard';

    protected static ?int $navigationSort = 1;

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
            BlogPostsChart::class,
            CustomerGrowth::class,
            FlaggedOrders::class,
            TopProductsbyRevenue::class,
            CustomerSegments::class,
            OrderValueDistribution::class,
            ProductMarginAnalysis::class,
        ];
    }
    public function getHeaderWidgetsColumns(): int|array
    {
        return 2;
    }
}
