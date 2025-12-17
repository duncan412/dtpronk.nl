<?php

namespace App\Fieldsets;

use App\Interfaces\FieldsetInterface;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\TextInput;

class GithubFieldSet extends BaseFieldset implements FieldsetInterface
{
    public function __construct()
    {
        $this->block = Block::make('Github')
            ->schema([
                TextInput::make('title')
                    ->label('Titel')
                    ->required(),
                TextInput::make('subtitle')
                    ->label('Subtitel'),
            ]);
    }
}
