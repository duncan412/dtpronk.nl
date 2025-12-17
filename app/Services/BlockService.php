<?php

namespace App\Services;

use App\Interfaces\FieldsetInterface;
use Filament\Forms\Components\Builder\Block;

class BlockService
{
    /**
     * @param string[] $blockNames
     * @return array<Block>
     */
    public function getBlocks(array $blockNames = []): array
    {
        $blocks = [];

        foreach ($blockNames as $blockName) {
            $class = 'App\Fieldsets\\' . ucfirst($blockName) . 'Fieldset';
            if (false === class_exists($class)) {
                throw new \Error($blockName . ' fieldset does not exist.');
            }

            /** @var FieldsetInterface $fieldset */
            $fieldset = (new $class);
            $blocks[] = $fieldset->block;
        }

        return $blocks;
    }
}
