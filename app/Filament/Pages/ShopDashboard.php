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
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Widgets\Widget;
use Filament\Pages\Dashboard as BaseDashboard;

use Filament\Schemas\Schema;
class ShopDashboard extends Page
{
    use HasFiltersForm;
    // protected string $view = 'filament.pages.shop-dashboard';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'Shop Dashboard';

    protected static ?string $title = 'Shop Dashboard';

    protected static ?int $navigationSort = 1;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Dashboard Filters')
                    ->schema([
                        DatePicker::make('startDate')
                            ->label('Start Date')
                            ->placeholder('Select start date'),

                        DatePicker::make('endDate')
                            ->label('End Date')
                            ->placeholder('Select end date')
                            ->afterOrEqual('startDate'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
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
