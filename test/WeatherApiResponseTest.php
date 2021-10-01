<?php

declare(strict_types=1);

namespace Tests;

use App\Model\WeatherApiResponse;
use JetBrains\PhpStorm\Pure;
use PHPUnit\Framework\TestCase;

final class WeatherApiResponseTest extends TestCase
{
    #[Pure]
    public function weatherProvider(): array
    {
        return [
            [100.23, 1.79, 0, '50d', 'fog'],
            [283.56, 2.59, 82, '11d', 'thunderstorm'],
            [295.11, 3.72, 83, '50n', 'scattered clouds'],
            [282.00, 4.19, 84, '50d', 'mist'],
            [283.25, 5.99, 360, '50d', 'rain'],
        ];
    }

    /**
     * @dataProvider weatherProvider
     */
    public function testCelsiusConversion(
        float $temperature,
        float $wind,
        int $windDeg,
        string $icon,
        string $description
    ): void
    {
        $response = new WeatherApiResponse(
            $temperature,
            $icon,
            $description
        );

        $this->assertSame($response->getTemperatureCelsius(), $temperature - 273.15);
    }
}