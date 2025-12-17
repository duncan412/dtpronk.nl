<?php

namespace App\Services;

class BlockService
{
    /**
     * @var array<string> $blockNames
     */
    public function getBlocks(array $blockNames = []): array
    {
        $blocks = [];

        foreach ($blockNames as $blockName) {
            $class = 'App\Fieldsets\\' . ucfirst($blockName) . 'Fieldset';
            if (false === class_exists($class)) {
                throw new \Error($blockName . ' fieldset does not exist.');
            }

            $blocks[] = (new $class)->block;
        }

//        dd($blocks);

        return $blocks;
    }
}
