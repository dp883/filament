<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Models\Product;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_number')
                    ->default(fn () => 'ORD-' . random_int(100000, 999999))
                    ->required()
                    ->readOnly(),
                Select::make('user_id')
                    ->relationship('user', 'name'),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required()
                    ->default('pending'),
                Repeater::make('items')
                    ->label('Order Products')
                    ->relationship()
                    ->schema([
                        Select::make('product_id')
                            ->label('Product')
                            ->relationship(
                                name: 'product',
                                titleAttribute: 'name'
                            )
                            ->searchable(['name', 'sku'])
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, Set $set) {
                                $product = Product::find($state);

                                if ($product) {
                                    $price = (float) $product->price;

                                    $set('unit_price', $price);
                                    $set('line_total', $price);
                                }
                            }),

                        TextInput::make('quantity')
                            ->label('Quantity')
                            ->numeric()
                            ->integer()
                            ->minValue(1)
                            ->default(1)
                            ->required()
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                $quantity = (int) ($get('quantity') ?: 1);
                                $price = (float) ($get('unit_price') ?: 0);

                                $set('line_total', round($quantity * $price, 2));
                            }),

                        TextInput::make('unit_price')
                            ->label('Unit Price')
                            ->numeric()
                            ->prefix('$')
                            ->required()
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set) {
                                $quantity = (int) ($get('quantity') ?: 1);
                                $price = (float) ($get('unit_price') ?: 0);

                                $set('line_total', round($quantity * $price, 2));
                            }),

                        TextInput::make('line_total')
                            ->label('Total')
                            ->numeric()
                            ->prefix('$')
                            ->readOnly()
                            ->dehydrated()
                            ->required(),

                    ])
                    ->columns(4)
                    ->defaultItems(1)
                    ->addActionLabel('Add More Products')
                    ->reorderable(false)
                    ->collapsible()
                    ->columnSpanFull(),
                Select::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required()
                    ->default('pending'),
                TextInput::make('payment_method'),
                TextInput::make('subtotal')
                    ->prefix('$')
                    ->readOnly()
                    ->dehydrated()
                    ->required(),
                TextInput::make('tax')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('shipping_cost')
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('$'),
                TextInput::make('total')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('shipping_name')
                    ->required(),
                TextInput::make('shipping_phone')
                    ->tel()
                    ->required(),
                Textarea::make('shipping_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('shipping_city')
                    ->required(),
                TextInput::make('shipping_state')
                    ->required(),
                TextInput::make('shipping_postal_code')
                    ->required(),
            ]);
    }
}
