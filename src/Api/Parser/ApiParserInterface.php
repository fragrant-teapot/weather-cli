<?php

declare(strict_types=1);

namespace App\Api\Parser;

use App\Model\WeatherApiResponse;

interface ApiParserInterface
{
    public function parse(string $response): WeatherApiResponse;
}