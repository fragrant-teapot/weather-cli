<?php

declare(strict_types=1);

namespace App\Api;

use App\Api\Parser\ApiParserInterface;
use App\Model\WeatherApiResponse;

interface WeatherApiInterface
{
    public function __construct(string $apiToken, ApiParserInterface $parser);

    public function getCurrentWeatherForCity(string $cityName): WeatherApiResponse;
}