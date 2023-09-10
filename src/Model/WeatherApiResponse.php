<?php

declare(strict_types=1);

namespace App\Model;

use App\Enum\OpenWeatherMapIcon;

readonly class WeatherApiResponse
{
    private const K_WATER_FREEZE = 273.15;

    public function __construct(
        public float $temperature,
        public OpenWeatherMapIcon $icon,
        public string $description
    ) {
    }

    public function getTemperatureCelsius(): float
    {
        return $this->temperature - self::K_WATER_FREEZE;
    }

    public function getSummary(): string
    {
        return sprintf(
            '%s %s, %d degrees celsius',
            $this->description,
            $this->icon->getEmojiForWeatherCode(),
            $this->getTemperatureCelsius()
        );
    }
}
