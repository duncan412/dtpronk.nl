<?php

declare(strict_types=1);

namespace App\Connector;

use GraphQL\Language\Parser;
use GraphQL\Language\Printer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;

class GithubGraphql
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.github.graphql_endpoint'),
            'headers' => [
                'Authorization' => 'Bearer '.config('services.github.token', ''),
                'Content-Type' => 'application/json',
                'User-Agent' => 'dtpronk.nl',
            ],
        ]);
    }

    public function getActivity(): ResponseInterface
    {
        $query = file_get_contents(
            resource_path('queries/github/get_activity.gql')
        );

        if ($query === false) {
            throw new \Exception('Unable to read query file');
        }

        $queryAst = Parser::parse($query);

        $queryString = Printer::doPrint($queryAst);

        try {
            return $this->client->post('', [
                'json' => [
                    'query' => $queryString,
                    'variables' => [
                        'login' => config('services.github.username'),
                    ],
                ],
            ]);
        } catch (RequestException $exception) {
            if (filled(config('services.github.token'))) {
                throw $exception;
            }

            Log::warning('GitHub activity could not be fetched because no GitHub token is configured.');

            return new Response(200, [], json_encode([
                'data' => [
                    'user' => [
                        'contributionsCollection' => [
                            'contributionCalendar' => [
                                'totalContributions' => 0,
                                'weeks' => [],
                            ],
                        ],
                    ],
                ],
            ], JSON_THROW_ON_ERROR));
        }
    }
}
