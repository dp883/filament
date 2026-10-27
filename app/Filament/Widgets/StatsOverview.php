<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Repeat Customer Rate', '19 %')
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Avg Items / Order', '2')
                ->description('456 items, 149 orders')
                ->descriptionIcon('heroicon-o-shopping-cart')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('info'),
            Stat::make('Cancellation Rate', '0 %')
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-x-circle')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('warning'),

            Stat::make('Revenue / Customer', '$3.12')
                ->description('3% increase')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
