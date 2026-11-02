<?php

namespace App\Fieldsets;

use Filament\Forms\Components\Builder\Block;

abstract class BaseFieldset
{
    public Block $block {
        get {
            return $this->block;
        }
    }
}
