<?php

declare(strict_types=1);

namespace App\DTO\Github;

class ContributionWeekDTO
{
    /**
     * @param ContributionDayDTO[] $days
     */
    public function __construct(
        public array $days
    ) {}
}
