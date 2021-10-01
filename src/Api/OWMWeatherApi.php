<?php

declare(strict_types=1);

namespace App\Api;

use App\Api\Parser\ApiParserInterface;
use App\Model\WeatherApiResponse;

class OWMWeatherApi implements WeatherApiInterface
{
    public const API_URL = 'api.openweathermap.org/data/2.5/weather';

    public function __construct(
        private string $apiToken,
        private ApiParserInterface $parser
    ) {
    }

    public function getCurrentWeatherForCity(string $cityName): WeatherApiResponse
    {
        return $this->parser->parse(
            $this->openWeatherMapRequest($cityName)
        );
    }

    private function openWeatherMapRequest(string $query): string
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->buildWeatherApiUrl($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    private function buildWeatherApiUrl(string $query): string
    {
        return self::API_URL . '?' . $this->getUrlQueryString($query) . '&' . $this->getUrlAuthString();
    }

    private function getUrlAuthString(): string
    {
        return 'appid=' . $this->apiToken;
    }

    private function getUrlQueryString(string $query): string
    {
        return 'q=' . $query;
    }
}