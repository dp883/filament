<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CustomerSegments extends ChartWidget
{
    protected ?string $heading = 'Customer Segments';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Revenue (₹)',
                    'data' => [45000, 32000, 25000, 18000],
                    'backgroundColor' => [
                        '#6B7280',
                        '#3B82F6',
                        '#16A34A',
                        '#F97316',
                    ],
                ],
            ],

            'labels' => [
                'One-time (1)',
                'Occasional (2-3)',
                'Regular (4-9)',
                'Vip (10+)',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
