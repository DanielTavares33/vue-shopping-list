<?php

declare(strict_types=1);

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Flex;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Model;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Flex::make([
                    Section::make()
                        ->icon(Heroicon::OutlinedShoppingBag)
                        ->description('Create a new product 2')
                        ->schema([
                            TextInput::make('name')
                                ->label('Name')
                                ->required()
                                ->maxLength(255),
                            Select::make('category_id')
                                ->label('Category')
                                ->relationship('category', 'name', fn ($query) => $query->orderBy('created_at', 'desc'))
                                ->getOptionLabelFromRecordUsing(fn (Model $record) => $record->icon . ' ' . $record->name)
                                ->preload()
                                ->searchable()
                                ->required(),
                        ])->columns(),
                ])->columnSpanFull()
            ]);
    }
}
