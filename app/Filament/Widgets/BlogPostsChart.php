<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BlogPostsChart extends ChartWidget
{
    protected ?string $heading = 'Blog Posts Chart';
    // protected string $color = 'info';

    public ?string $filter = 'today';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Last 12 months',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'borderColor' => '#3B82F6',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.15)',
                    'fill' => true,
                    'tension' => 0.1,
                ],
                [
                    'label' => 'Prior 12 months',
                    'data' => [20, 5, 15, 21, 12, 23, 34, 47, 56, 54, 77, 98],
                    'borderColor' => '#EF4444', // Red line
                    'backgroundColor' => '#EF4444',
                ],
            ],
            'labels' => ['Jan 2025', 'Feb 2025', 'Mar 2025', 'Apr 2025', 'May 2025', 'Jun 2025', 'Jul 2025', 'Aug 2025', 'Sep 2025', 'Oct 2025', 'Nov 2025', 'Dec 2025'],
            
        ];
    }
    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
