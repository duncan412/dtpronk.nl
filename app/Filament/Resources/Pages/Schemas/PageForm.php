<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Services\BlockService;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make()
                ->columns(3)
                ->columnSpanFull()
                ->schema([
                    Section::make('Content')
                        ->schema([
                            TextInput::make('title')
                                ->live(onBlur: true)
                                ->required()
                                ->columnSpanFull()
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                    if (null === $state || null === $old) return;

                                    if (($get('slug') ?? '') !== Str::slug($old)) {
                                        return;
                                    }

                                    $set('slug', Str::slug($state));
                                }),
                            Builder::make('content')
                                ->columnSpanFull()
                                ->blocks((new BlockService)->getBlocks([
                                    'github'
                                ])),
                        ])
                        ->columnSpan(2), // wider main area

                    // Sidebar area
                    Section::make('Meta')
                        ->schema([
                            TextInput::make('slug')
                                ->readOnly(true)
                                ->required(),

//                                Select::make('status')
//                                    ->options([
//                                        'draft' => 'Draft',
//                                        'published' => 'Published',
//                                    ])
//                                    ->default('draft'),
                        ])
                        ->columnSpan(1),
                ]),
        ]);
    }
}
