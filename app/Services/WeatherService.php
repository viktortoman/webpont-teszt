<?php

namespace App\Services;

use App\Repositories\WeatherRepository;
use GuzzleHttp\Client;

class WeatherService
{
    private string $apiKey = '';

    public function __construct(
        private WeatherRepository $weatherRepository
    )
    {
        $this->apiKey = env('WEATHER_API_KEY');
    }

    public function fetchAllData(string $lat, string $lng)
    {
        $url = env('WEATHER_API_URL') . "?lat={$lat}&lon={$lng}&appid={$this->apiKey}";

        $client = new Client(['verify' => false]);
        $response = $client->get($url);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function store(string $lat, string $lng)
    {
        $data = $this->fetchAllData($lat, $lng);

        return $this->weatherRepository->save($data);
    }
}
