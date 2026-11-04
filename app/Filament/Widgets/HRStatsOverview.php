<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HRStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Avg Tenure', '2.7 yrs')
                ->description('106 active employees')
                ->descriptionIcon('heroicon-m-clock')
                ->color('info'),
            Stat::make('Turnover Rate', '8.6 %')
                ->description('10 departed of 116')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
            Stat::make('Open Capacity', '37')
                ->description('Limit: 143, filled: 106')
                ->descriptionIcon('heroicon-o-user')
                ->color('success'),
            Stat::make('Contractor Ratio', '17 %')
                ->description('18 contractors')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('info'),
        ];
    }
}
