<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\BudgetBurnRate;
use App\Filament\Widgets\DepartmentLeaveLoad;
use App\Filament\Widgets\HRStatsOverview;
use App\Filament\Widgets\ProjectHealth;
use App\Filament\Widgets\UtilizationRate;
use Filament\Pages\Page;

class HRDashboard extends Page
{
    protected string $view = 'filament.pages.h-r-dashboard';

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationLabel = 'HR Dashboard';

    protected static ?string $title = 'HR Dashboard';

    protected static ?int $navigationSort = 1;

    protected function getHeaderWidgets(): array
    {
        return [
            HRStatsOverview::class,
            DepartmentLeaveLoad::class,
            ProjectHealth::class,
            UtilizationRate::class,
            BudgetBurnRate::class,
            // CustomerSegments::class,
            // OrderValueDistribution::class,
            // ProductMarginAnalysis::class,
        ];
    }
    public function getHeaderWidgetsColumns(): int|array
    {
        return 2;
    }
}
