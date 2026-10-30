<?php

namespace App\Filament\Resources\Customers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")
                    ->label("Name")
                    ->placeholder("-")
                    ->searchable()
                    ->sortable(),
                TextColumn::make("email")
                    ->label("Email")
                    ->placeholder("-")
                    ->searchable()
                    ->sortable(),
                TextColumn::make("phone")
                    ->label("Phone")
                    ->placeholder("-")
                    ->searchable()
                    ->sortable(),
                ToggleColumn::make("is_active")
                    ->label("Active")
                ])
            ->filters([
                SelectFilter::make('is_active')
                ->label('Status')
                ->options([
                    1 => 'Active',
                    0 => 'Inactive',
                ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
