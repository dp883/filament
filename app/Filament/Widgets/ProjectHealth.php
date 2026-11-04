<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class ProjectHealth extends ChartWidget
{
    protected ?string $heading = 'Project Health';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Budget Used %',
                    'data' => [0, 10, 20, 30],
                    'backgroundColor' => ['#3b82f6'], //blue
                ],
                [
                    'label' => 'Timeline Elapsed %',
                    'data' => [25, 30, 20, 39],
                    'backgroundColor' => ['#10b981'], 
                ],
            ],
            'labels' => ['Fully Configurable', 'Optional Client Server', 'Reactive High Level',],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
