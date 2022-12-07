<?php

namespace App\Repositories;

use App\Models\Weather;

class WeatherRepository
{
    public function __construct(
        private Weather $weather,
        private CityRepository $cityRepository
    ) {}

    public function save($data)
    {
        $mainData = $data['main'];

        $city = $this->cityRepository->save($data);

        if ($city) {
            $weather = new $this->weather;

            $weather->weather = $data['weather'][0]['main'];
            $weather->temp = $mainData['temp'];
            $weather->temp_min = $mainData['temp_min'];
            $weather->temp_max = $mainData['temp_max'];
            $weather->humidity = $mainData['humidity'];
            $weather->pressure = $mainData['pressure'];
            $weather->city_id = $city->id;

            $weather->save();

            return $weather->fresh();
        }

        return null;
    }

    public function getAll()
    {
        return $this->weather->get();
    }
}
