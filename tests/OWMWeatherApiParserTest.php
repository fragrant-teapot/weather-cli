<?php

declare(strict_types=1);

namespace Tests;

use App\Api\Parser\OWMWeatherApiParser;
use App\Model\WeatherApiResponse;
use JetBrains\PhpStorm\Pure;
use PHPUnit\Framework\TestCase;

final class OWMWeatherApiParserTest extends TestCase
{
    private const OWM_RESPONSE_JSON = __DIR__ . '/TestData/cities_weather.json';

    #[Pure]
    public function weatherProvider(): array
    {
        $data = json_decode(file_get_contents(self::OWM_RESPONSE_JSON), true, JSON_THROW_ON_ERROR);

        $ret = [];
        foreach ($data['list'] as $city) {
            $ret[] = [
                $city['main']['temp'],
                $city['wind']['speed'],
                $city['wind']['deg'],
                $city['weather'][0]['icon'],
                $city['weather'][0]['description'],
                json_encode($city)
            ];
        }

        return $ret;
    }

    /**
     * @dataProvider weatherProvider
     * Values in provider must be the same as in saved json response for test to work correctly
     */
    public function testParse(
        float $temparature,
        float $wind,
        int $windDeg,
        string $icon,
        string $description,
        string $rawJson
    ): void {
        $response = new WeatherApiResponse(
            $temparature,
            $icon,
            $description
        );

        $parser = new OWMWeatherApiParser();
        $this->assertEquals(
            $parser->parse($rawJson)
            , $response
        );
    }
}
