<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class DepartmentLeaveLoad extends ChartWidget
{
    protected ?string $heading = 'Department Leave Load';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Leave Days',
                    'data' => [0, 0, 20, 30, 70, 100],
                    'backgroundColor' => ['#10b981', '#3b82f6', '#8b5cf6', '#f59e0b', '#ef4444', '#ec4899'],
                ],
            ],
            'labels' => ['Operations', 'QA', 'Frontend', 'Design', 'Content', 'Backend','Legal','SEO'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
