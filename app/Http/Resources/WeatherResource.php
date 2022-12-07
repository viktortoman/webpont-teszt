<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'weather' => $this->weather,
            'temp' => $this->temp,
            'tempMin' => $this->temp_min,
            'tempMax' => $this->temp_max,
            'humidity' => $this->humidity,
            'pressure' => $this->pressure,
            'city' => new CityResource($this->city()->first())
        ];
    }
}
