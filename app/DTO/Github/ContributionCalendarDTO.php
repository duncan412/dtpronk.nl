<?php

namespace App\DTO\Github;

class ContributionCalendarDTO
{
    /**
     * @param ContributionWeekDTO[] $weeks
     */
    public function __construct(
        public int $totalContributions,
        public array $weeks
    ) {}
}
