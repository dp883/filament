<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CustomerGrowth extends ChartWidget
{
    protected ?string $heading = 'Customer Growth';
    protected string $color = 'info';
    public ?string $filter = 'today';
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Customer growth',
                    'data' => [20, 5, 60, 70, 66, 120, 160, 140, 180, 210, 220, 240, 260],
                    'borderColor' => '#16A34A',
                    'backgroundColor' => 'rgba(22, 163, 74, 0.15)',
                    'fill' => true,
                    'tension' => 0.1,
                ],
            ],
            'labels' => ['Jan 2026', 'Feb 2026', 'Mar 2026', 'Apr 2026', 'May 2026', 'Jun 2026', 'Jul 2026', 'Aug 2026', 'Sep 2026', 'Oct 2026', 'Nov 2026', 'Dec 2026'],
        ];
    }

    
    protected function getType(): string
    {
        return 'line';
    }
}
