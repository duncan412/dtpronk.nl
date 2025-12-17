<?php

declare(strict_types=1);

namespace App\Connector;

use GraphQL\Language\Parser;
use GraphQL\Language\Printer;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class GithubGraphql
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.github.graphql_endpoint'),
            'headers' => [
                'Authorization' => 'Bearer ' . config('services.github.token', ''),
                'Content-Type' => 'application/json',
                'User-Agent' => 'dtpronk.nl'
            ]
        ]);
    }

    public function getActivity(): ResponseInterface
    {
        $query = file_get_contents(
            resource_path('queries/github/get_activity.gql')
        );

        if (false === $query) {
            throw new \Exception('Unable to read query file');
        }

        $queryAst = Parser::parse($query);

        $queryString = Printer::doPrint($queryAst);

        return $this->client->post('', [
            'json' => [
                'query' => $queryString,
                'variables' => [
                    'login' => config('services.github.username'),
                ]
            ]
        ]);
    }
}
