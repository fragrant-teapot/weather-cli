<?php

declare(strict_types=1);

namespace Tests;

use App\Api\WeatherApiInterface;
use App\Enum\OpenWeatherMapIcon;
use App\Model\WeatherApiResponse;
use App\Weather;
use PHPUnit\Framework\TestCase;

final class WeatherTest extends TestCase
{
    public static function weatherProvider(): array
    {
        return [
            [
                'Warsaw',
                'few clouds 🌤️, 14 degrees celsius',
                new WeatherApiResponse(
                    288.0,
                    OpenWeatherMapIcon::FEW_CLOUDS_DAY,
                    'few clouds'
                )
            ],
            [
                'Berlin',
                'clear sky ☀️, 16 degrees celsius',
                new WeatherApiResponse(
                    290.0,
                    OpenWeatherMapIcon::CLEAR_SKY_DAY,
                    'clear sky'
                )
            ],
            [
                'Zagreb',
                'overcast clouds 🌥️, 15 degrees celsius',
                new WeatherApiResponse(
                    289.0,
                    OpenWeatherMapIcon::BROKEN_CLOUDS_DAY,
                    'overcast clouds'
                )
            ],
        ];
    }


    public function test__construct(): void
    {
        $mock = $this->createMock(WeatherApiInterface::class);

        $this->assertObjectHasProperty('api', new Weather($mock));
    }

    /**
     * @dataProvider weatherProvider
     */
    public function testGetWeatherSummaryForCityName(
        string $name,
        string $return,
        WeatherApiResponse $weatherApiResponse
    ): void {
        $apiMock = $this->createMock(WeatherApiInterface::class);
        $apiMock->method('getCurrentWeatherForCity')->willReturn($weatherApiResponse);

        $weather = new Weather($apiMock);

        $this->assertEquals($return, $weather->getWeatherSummaryForCityName($name));
    }
}
