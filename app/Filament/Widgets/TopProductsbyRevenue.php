<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TopProductsbyRevenue extends ChartWidget
{
    protected ?string $heading = 'Top Products by Revenue';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Revenue',
                    'data' => [24000, 23500, 23000, 21500, 21000, 20500, 20000, 19800, 19000, 18800], // Revenue values matching your products
                    'backgroundColor' => '#3b82f6', // Blue color for the bars
                ],
            ],
            'labels' => [
                'Maple Vase', 
                'Coastal Water Bottle', 
                'Alpine Lunch Box', 
                'Coastal Jump Rope', 
                'Copper Jump Rope', 
                'Walnut Duffel Bag', 
                'Venture Hoodie', 
                'Indigo Pillow', 
                'Walnut Phone Mount', 
                'Porto Water Bottle'
            ],    
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y', 
            'scales' => [
                'x' => [
                    'beginAtZero' => true,
                    'max' => 25000,
                ],
            ],
        ];
    }
}
