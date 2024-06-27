<?php

namespace App\Services;

use GuzzleHttp\Client;

class JsonServerService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://localhost:3000']);
    }

    public function getData($endpoint, $queryParams = [])
    {
        $response = $this->client->request('GET', $endpoint, [
            'query' => $queryParams
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param array<mixed> $userData
     *
     * @return array<mixed>
     */
    public function createData($endpoint, array $data): array
    {
        $response = $this->client->request('POST', $endpoint, [
            'json' => $data
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // public function getReminder($queryParams)
    // {
    //     $response = $this->client->request('GET', 'reminders', [
    //         'query' => $queryParams
    //     ]);
    // }
}
