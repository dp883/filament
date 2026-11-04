<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class UtilizationRate extends ChartWidget
{
    protected ?string $heading = 'Utilization Rate';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Utilization %',
                    'data' => [20, 5, 60, 70, 66, 38, 78, 56, 80, 21, 67, 88, 67],
                    'borderColor' => '#16A34A',
                    'backgroundColor' => 'rgba(22, 163, 74, 0.15)',
                    'fill' => true,
                    'tension' => 0.1,
                ],
                [
                    'label' => 'Target %',
                    'data' => [80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80, 80],
                    'borderColor' => '#F59E0B',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.15)',
                    'fill' => true,
                    'tension' => 0.1,   
                ]
            ],
            'labels' => ['Aug 17', 'Aug  24', 'Aug 31 ', 'Apr 2026', 'Sep 07', 'Sep 14', 'Sep 21', 'Sep 28', 'Oct 05', 'Oct 12', 'Oct 19', 'Oct 26'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
