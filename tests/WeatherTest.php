<?php

declare(strict_types=1);

namespace Tests;

use App\Api\WeatherApiInterface;
use App\Model\WeatherApiResponse;
use App\Weather;
use PHPUnit\Framework\TestCase;

final class WeatherTest extends TestCase
{
    public function weatherProvider(): array
    {
        return [
            [
                'Warsaw',
                'few clouds ⛅, 15 degrees celsius'
            ],
            [
                'Berlin',
                'clear sky ☀️, 17 degrees celsius'
            ],
            [
                'Zagreb',
                'overcast clouds 🌥️, 16 degrees celsius'
            ]
        ];
    }


    public function test__construct(): void
    {
        $mock = $this->createMock(WeatherApiInterface::class);

        $this->assertObjectHasAttribute('api', new Weather($mock));
    }

    /**
     * @dataProvider weatherProvider
     */
    public function testGetWeatherSummaryForCityName(string $name, string $return): void
    {
        $apiMock = $this->createMock(WeatherApiInterface::class);
        $responseMock = $this->createMock(WeatherApiResponse::class);
        $apiMock->method('getCurrentWeatherForCity')->willReturn($responseMock);
        $responseMock->method('getSummary')->willReturn($return);

        $weather = new Weather($apiMock);

        $this->assertEquals($return, $weather->getWeatherSummaryForCityName($name));
    }
}
