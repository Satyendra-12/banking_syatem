<?php
// app/Services/GooglePlacesService.php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class GooglePlacesService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getCities($query)
    {
        $apiKey = config('services.google.api_key');
        $url = "https://maps.googleapis.com/maps/api/place/autocomplete/json";

        $response = $this->client->get($url, [
            'query' => [
                'input' => $query,
                'types' => '(cities)',
                'key' => $apiKey,
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

}
