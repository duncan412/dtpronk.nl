<?php

declare(strict_types=1);

namespace App\Services;

use App\Connector\GithubGraphql;
use App\DTO\Github\ContributionCalendarDTO;
use App\DTO\Github\ContributionDayDTO;
use App\DTO\Github\ContributionWeekDTO;
use Illuminate\Support\Facades\Cache;

class Github
{
    public function __construct(private readonly GithubGraphql $gh) {}

    public function getActivity(): ContributionCalendarDTO
    {
        $cacheKey   = 'github.contributions';
        $ttl        = (int) config('services.github.cache_ttl', 3600);

        return Cache::remember($cacheKey, $ttl, function () {
            return $this->fetchActivity();
        });
    }


    private function fetchActivity(): ContributionCalendarDTO
    {
        $response = $this->gh->getActivity();

        $data = json_decode($response->getBody()->getContents(), true);

        $calendar =
            $data['data']['user']['contributionsCollection']['contributionCalendar'];

        $weeks = [];

        foreach ($calendar['weeks'] as $week) {
            $days = array_filter(
                $week['contributionDays'],
                function ($day) {
                    return $day['contributionCount'] > 0;
                }
            );

            if (empty($days)) continue;

            $dayDtos = array_map(
                fn($d) =>
                new ContributionDayDTO(
                    date: $d['date'],
                    count: $d['contributionCount']
                ),
                $days
            );

            $weeks[] = new ContributionWeekDTO(days: $dayDtos);
        }

        return new ContributionCalendarDTO(
            totalContributions: $calendar['totalContributions'],
            weeks: $weeks
        );
    }
}
