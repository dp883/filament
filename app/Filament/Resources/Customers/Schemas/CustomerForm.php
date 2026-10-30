<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make("name")
                            ->label("Name")
                            ->required()
                            ->maxLength(255),
                        TextInput::make("email")
                            ->label("Email")
                            ->unique()
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make("phone")
                            ->label("Phone")
                            ->unique()
                            ->tel()
                            ->required()
                            ->maxLength(20),
                        TextInput::make("password")
                            ->label("Password")
                            ->password()
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->maxLength(255)
                            ->dehydrated(fn ($state) => filled($state)),
                        TextInput::make("password_confirmation")
                            ->label("Confirm Password")
                            ->password()
                            ->requiredWith('password')
                            ->maxLength(255)
                            ->same('password')
                            ->dehydrated(false),
                        Toggle::make("is_active")
                            ->label("Active")
                            ->default(true),
                    ])
            ]);
    }
}
