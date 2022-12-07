<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'lat' => $this->lat,
            'lng' => $this->lng,
        ];
    }
}
