<?php

declare(strict_types=1);

namespace Tests;

use App\Api\OWMWeatherApi;
use App\Api\Parser\ApiParserInterface;
use App\Enum\OpenWeatherMapIcon;
use App\Model\WeatherApiResponse;
use PHPUnit\Framework\TestCase;

final class OWMWeatherApiTest extends TestCase
{
    public function test__construct(): void
    {
        $mock = $this->createMock(ApiParserInterface::class);

        $api = new OWMWeatherApi('loremipsum', $mock);
        $this->assertObjectHasProperty('parser', $api);
    }

    public function testGetCurrentWeatherForCity(): void
    {
        $mock = $this->createMock(ApiParserInterface::class);
        $response = new WeatherApiResponse(
            1337.0,
            OpenWeatherMapIcon::CLEAR_SKY_DAY,
            'tad warm'
        );

        $mock->method('parse')->willReturn($response);

        $api = new OWMWeatherApi('loremipsum', $mock);
        $this->assertSame($response, $api->getCurrentWeatherForCity('loremipsum'));
    }
}
