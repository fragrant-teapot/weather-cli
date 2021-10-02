<?php

declare(strict_types=1);

namespace App\Model;

use App\Enum\OpenWeatherMapIcons;

class WeatherApiResponse //todo move getters to readonly properties once php8.1 comes around
{
    private const K_WATER_FREEZE = 273.15;

    public function __construct(
        private float $temperature,
        private string $icon,
        private string $description
    ) {
    }

    public function getTemperatureKelvin(): float
    {
        return $this->temperature;
    }

    public function getTemperatureCelsius(): float
    {
        return $this->temperature - self::K_WATER_FREEZE;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSummary(): string
    {
        return sprintf('%s %s, %d degrees celsius',
            $this->getDescription(),
            OpenWeatherMapIcons::getEmojiForWeatherCode($this->getIcon()),
            $this->getTemperatureCelsius()
        );
    }
}
