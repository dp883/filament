<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class TopProductsbyRevenue extends ChartWidget
{
    protected ?string $heading = 'Top Productsby Revenue';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
