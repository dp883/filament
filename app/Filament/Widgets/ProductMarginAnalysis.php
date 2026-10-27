<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ProductMarginAnalysis extends ChartWidget
{
    protected ?string $heading = 'Product Margin Analysis';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Products',
                    'data' => [
                        ['x' => 20, 'y' => 85],
                        ['x' => 25, 'y' => 98],
                        ['x' => 35, 'y' => 5],
                        ['x' => 50, 'y' => 330],
                        ['x' => 58, 'y' => 305],
                        ['x' => 22, 'y' => 78],
                        ['x' => 70, 'y' => 68],
                        ['x' => 80, 'y' => 89],
                        ['x' => 90, 'y' => 88],
                        ['x' => 100, 'y' => 90],
                        ['x' => 110, 'y' => 95],
                        ['x' => 120, 'y' => 66],
                        ['x' => 130, 'y' => 56],
                        ['x' => 140, 'y' => 87],
                        ['x' => 150, 'y' => 81],
    ],
                    'backgroundColor' => '#3b82f6',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'scatter';
    }
}
