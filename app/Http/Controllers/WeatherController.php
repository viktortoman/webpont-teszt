<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherResource;
use App\Models\Weather;
use App\Http\Requests\StoreWeatherRequest;
use App\Http\Requests\UpdateWeatherRequest;
use App\Repositories\WeatherRepository;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    public function __construct(private WeatherRepository $weatherRepository)
    {
    }

    public function getAll(): JsonResponse
    {
        $result = ['status' => 200];

        try {
            $result['data'] = WeatherResource::collection($this->weatherRepository->getAll());
        } catch(\Exception $exception) {
            $result = [
                'status' => 500,
                'error' => $exception->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

}
