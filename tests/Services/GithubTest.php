<?php

namespace Tests\Services;

use App\Connector\GithubGraphql;
use App\DTO\Github\ContributionCalendarDTO;
use App\DTO\Github\ContributionDayDTO;
use App\DTO\Github\ContributionWeekDTO;
use App\Services\Github;
use Illuminate\Support\Facades\Cache;
use Mockery;

test('getActivity returns a filled ContributionCalendarDTO', function () {
    // Arrange
    $mockResponse = [
        'data' => [
            'user' => [
                'contributionsCollection' => [
                    'contributionCalendar' => [
                        'totalContributions' => 100,
                        'weeks' => [
                            [
                                'contributionDays' => [
                                    ['date' => '2025-01-01', 'contributionCount' => 5],
                                    ['date' => '2025-01-02', 'contributionCount' => 0],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];

    $mockGraphql = Mockery::mock(GithubGraphql::class);
    $mockGraphql->shouldReceive('getActivity')
        ->andReturn(new \GuzzleHttp\Psr7\Response(200, [], json_encode($mockResponse)));

    $githubService = new Github($mockGraphql);

    Cache::shouldReceive('remember')
        ->andReturnUsing(function ($key, $ttl, $callback) {
            return $callback();
        });

    // Act
    $result = $githubService->getActivity();

    // Assert
    expect($result)->toBeInstanceOf(ContributionCalendarDTO::class);
    expect($result->totalContributions)->toBe(100);
    expect($result->weeks)->toHaveCount(1);
    expect($result->weeks[0])->toBeInstanceOf(ContributionWeekDTO::class);
    expect($result->weeks[0]->days)->toHaveCount(1);
    expect($result->weeks[0]->days[0])->toBeInstanceOf(ContributionDayDTO::class);
    expect($result->weeks[0]->days[0]->date)->toBe('2025-01-01');
    expect($result->weeks[0]->days[0]->count)->toBe(5);
});
