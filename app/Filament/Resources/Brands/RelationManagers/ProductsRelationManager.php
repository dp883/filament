<?php

namespace App\Filament\Resources\Brands\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Group::make()
                    ->columnSpan(2)
                    ->schema([
                        Section::make('Product Details')
                            ->description('This is product details')
                            ->columns(2)
                            ->schema([
                                TextInput::make('name')
                                    ->unique()
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                Textarea::make('description')
                                    ->rows(3)
                                    ->columnSpanFull()
                            ]),
                        Section::make('Price')
                            ->columns(2)
                            ->schema([
                                TextInput::make('price')
                                    ->numeric()
                                    ->prefix('₹')
                                    ->minValue(0)
                                    ->required(),
                                // TextInput::make('cost_price')
                                //     ->label('Cost Price')
                                //     ->helperText("Customers won't see this price.")
                                //     ->numeric()
                                //     ->prefix('₹')
                                //     ->minValue(0)
                                //     ->required(),
                                // TextInput::make('compare_at_price')
                                //     ->label('Compare-at Price')
                                //     ->numeric()
                                //     ->minValue(0)
                                //     ->prefix('₹')
                            ]),
                        Section::make('Product Image')
                            ->description('This is product image')
                            ->columns(1)
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->disk('public')
                                    ->directory('products')
                                    ->imageEditor()
                                    ->maxSize(2048)
                                    ->nullable(),
                            ]),
                    ]),
                Group::make()
                    ->columnSpan(1)
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('is_active')
                                    ->helperText('Controls whether this product appears in sales channels.')
                                    ->label('Active')
                                    ->default(true),
                            ]),
                        Section::make('Associations')
                            ->schema([
                                Select::make('brand_id')
                                    ->label('Brand')
                                    ->relationship('brand', 'name')
                                    ->searchable()
                                    ->nullable(),
                                Select::make('category_id')
                                    ->label('Category')
                                    ->relationship('category', 'name')
                                    ->searchable()
                                    // ->multiple()
                                    ->required(),
                            ]),
                        ]),
                Group::make()
                    ->columnSpan(2)
                    ->schema([
                        Section::make('Inventory')
                            ->columns(2)
                            ->schema([
                                TextInput::make('sku')
                                    ->label('SKU')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('stock_quantity')
                                    ->label('Stock Quantity')
                                    ->numeric()
                                    ->minValue(0)
                                    ->required(),
                            ]),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->square(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('sku')
                    ->searchable(),

                TextColumn::make('price')
                    ->money('INR'),

                TextColumn::make('stock_quantity'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                // AssociateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                // DissociateAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
