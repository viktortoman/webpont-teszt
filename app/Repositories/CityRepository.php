<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository
{
    protected City $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function save($data)
    {
        $coords = $data['coord'];

        $city = new $this->city;

        $city->name = $data['name'];
        $city->lat = $coords['lat'];
        $city->lng = $coords['lon'];

        $city->save();

        return $city->fresh();
    }
}
