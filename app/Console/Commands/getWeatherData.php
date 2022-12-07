<?php

namespace App\Console\Commands;

use App\Services\WeatherService;
use Illuminate\Console\Command;

class getWeatherData extends Command
{
    public function __construct(
        private WeatherService $weatherService
    )
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-weather-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get weather data from Open Weather API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->weatherService->store('46.253', '20.14824');
        $this->info('Weathers saved successfully.');
    }
}
