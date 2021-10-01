<?php

declare(strict_types=1);

namespace Tests;

use App\Api\OWMWeatherApi;
use App\Api\Parser\ApiParserInterface;
use App\Model\WeatherApiResponse;
use PHPUnit\Framework\TestCase;

final class OWMWeatherApiTest extends TestCase
{

    public function test__construct(): void
    {
        $mock = $this->createMock(ApiParserInterface::class);

        $api = new OWMWeatherApi('loremipsum', $mock);
        $this->assertObjectHasAttribute('parser', $api);
    }

    public function testGetCurrentWeatherForCity(): void
    {
        $mock = $this->createMock(ApiParserInterface::class);
        $responseMock = $this->createMock(WeatherApiResponse::class);
        $mock->method('parse')->willReturn($responseMock);

        $api = new OWMWeatherApi('loremipsum', $mock);
        $this->assertSame($responseMock, $api->getCurrentWeatherForCity('loremipsum'));
    }
}
