<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class OrderValueDistribution extends ChartWidget
{
    protected ?string $heading = 'Order Value Distribution';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => [0, 0, 20, 30, 70, 100],
                    'backgroundColor' => ['#10b981', '#3b82f6', '#8b5cf6', '#f59e0b', '#ef4444', '#ec4899'],
                ],
            ],
            'labels' => ['$0 - 50', '$50 - 100', '$100 - 250', '$250 - 500', '$500 - 1k', '$1k +'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
