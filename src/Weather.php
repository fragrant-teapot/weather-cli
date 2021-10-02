<?php

declare(strict_types=1);

namespace App;

use App\Api\WeatherApiInterface;

class Weather
{
    public function __construct(private WeatherApiInterface $api)
    {}

    public function getWeatherSummaryForCityName(string $name): string
    {
        return $this->api->getCurrentWeatherForCity($name)->getSummary();
    }
}
