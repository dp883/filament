<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;

class ProductMarginAnalysis extends ChartWidget
{
    protected ?string $heading = 'Product Margin Analysis';

    protected function getData(): array
    {
        $products = Product::query()
            ->where('is_active', true)
            ->select(['name', 'price', 'stock_quantity'])
            ->get();
        return [
            'datasets' => [
                [
                    'label' => 'Products',
                    'data' => $products->map(fn (Product $product) => [
                        'x' => (float) $product->price,
                        'y' => (int) $product->stock_quantity,
                    ])->values()->all(),
                    'backgroundColor' => '#3b82f6',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'scatter';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Product Price',
                    ],
                ],
                'y' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Stock Quantity',
                    ],
                ],
            ],
        ];
    }
}
