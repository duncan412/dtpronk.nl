<?php

namespace Tests\Services;

use App\Connector\GithubGraphql;
use App\DTO\Github\ContributionCalendarDTO;
use App\DTO\Github\ContributionDayDTO;
use App\DTO\Github\ContributionWeekDTO;
use App\Services\Github;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Cache;
use Mockery;

test('GitHub activity view links to the profile when the token is missing', function () {
    config([
        'services.github.token' => null,
        'services.github.username' => 'duncan412',
    ]);

    $html = view('components.github-activity')->render();

    expect($html)->toContain('href="https://github.com/duncan412"')
        ->and($html)->toContain('View my GitHub profile')
        ->and($html)->not->toContain('gh-heatmap-tooltip');
});

test('getActivity returns an empty calendar when the GitHub token is missing', function () {
    config(['services.github.token' => null]);

    $connector = new GithubGraphql;
    $client = new Client([
        'handler' => HandlerStack::create(new MockHandler([
            new Response(401),
        ])),
        'http_errors' => true,
    ]);

    $clientProperty = new \ReflectionProperty(GithubGraphql::class, 'client');
    $clientProperty->setValue($connector, $client);

    $response = $connector->getActivity();
    $calendar = json_decode((string) $response->getBody(), true)['data']['user']['contributionsCollection']['contributionCalendar'];

    expect($calendar['totalContributions'])->toBe(0);
    expect($calendar['weeks'])->toBe([]);
});

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
