<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BudgetBurnRate extends ChartWidget
{
    protected ?string $heading = 'Budget Burn Rate';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Cumulative Expenses',
                    'data' => [20, 50000, 6000, 7000, 66000, 120000, 160000, 140000, 180000, 210000, 122000, 124000, 126000],
                    'borderColor' => '#16A34A',
                    'backgroundColor' => 'rgba(22, 163, 74, 0.15)',
                    'fill' => true,
                    'tension' => 0.1,
                ],
                [
                    'label'=> 'Total Budget',
                    'data'=> [1680000, 1680000, 1680000, 1680000, 1680000, 1680000, 1680000, 1680000, 1680000, 1680000, 1680000, 1680000, 1680000],
                    'borderColor' => '#F59E0B',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.15)',
                    'fill' => true,
                    'tension' => 0.1,
                ]
            ],
            'labels' => [ 'Dec 2025','Jan 2026', 'Feb 2026', 'Mar 2026', 'Apr 2026', 'May 2026', 'Jun 2026', 'Jul 2026', 'Aug 2026', 'Sep 2026', 'Oct 2026', 'Nov 2026',],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
