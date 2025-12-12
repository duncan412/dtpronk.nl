<?php

declare(strict_types=1);

namespace App\DTO\Github;

class ContributionDayDTO
{
    public function __construct(
        public string $date,
        public int $count
    ) {}
}
