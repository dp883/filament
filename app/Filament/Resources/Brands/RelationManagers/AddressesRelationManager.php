<?php

namespace App\Filament\Resources\Brands\RelationManagers;

use App\Models\BrandAddress;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AddressesRelationManager extends RelationManager
{
    protected static string $relationship = 'addresses';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('street')
                    ->required(),
                TextInput::make('city')
                    ->required(),

                TextInput::make('state')
                    ->required(),

                TextInput::make('postal_code')
                    ->required(),

                TextInput::make('country')
                    ->default('India')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('street')
                    ->searchable(),
                TextColumn::make('city'),

                TextColumn::make('state'),

                TextColumn::make('postal_code'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make()
                    ->recordTitleAttribute('street')
                    ->recordSelectSearchColumns([
                        'street',
                        'city',
                        'state',
                        'postal_code',
                    ])
                    ->recordSelectOptionsQuery(
                        fn (Builder $query) => $query->whereNull('brand_id')
                    )
                    ->preloadRecordSelect(),
            ])
            ->recordActions([
                EditAction::make(),
                DissociateAction::make(),
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
