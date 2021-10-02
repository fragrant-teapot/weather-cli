<?php

declare(strict_types=1);

namespace App\Api\Parser;

use App\Model\WeatherApiResponse;

class OWMWeatherApiParser implements ApiParserInterface
{
    public function parse(string $response): WeatherApiResponse
    {
        $response = json_decode($response, true, JSON_THROW_ON_ERROR);

        return new WeatherApiResponse(
            $response['main']['temp'],
            $response['weather'][0]['icon'],
            $response['weather'][0]['description']
        );
    }
}
