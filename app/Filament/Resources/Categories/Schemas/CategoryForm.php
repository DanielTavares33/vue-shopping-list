<?php

declare(strict_types=1);

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Flex::make([
                    Section::make()
                        ->schema([

                            TextInput::make('icon')
                                ->label('Icon')
                                ->maxLength(255),
                            TextInput::make('name')
                                ->label('Name')
                                ->required()
                                ->maxLength(255),
                        ])->columns(),
                ])->columnSpanFull()

            ]);
    }
}
