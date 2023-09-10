<?php

declare(strict_types=1);

namespace App\Enum;

enum OpenWeatherMapIcon: string
{
    case CLEAR_SKY_DAY = '01d';
    case CLEAR_SKY_NIGHT = '01n';
    case FEW_CLOUDS_DAY = '02d';
    case FEW_CLOUDS_NIGHT = '02n';
    case SCATTERED_CLOUDS_DAY = '03d';
    case SCATTERED_CLOUDS_NIGHT = '03n';
    case BROKEN_CLOUDS_DAY = '04d';
    case BROKEN_CLOUDS_NIGHT = '04n';
    case SHOWER_RAIN_DAY = '09d';
    case SHOWER_RAIN_NIGHT = '09n';
    case RAIN_DAY = '10d';
    case RAIN_NIGHT = '10n';
    case THUNDERSTORM_DAY = '11d';
    case THUNDERSTORM_NIGHT = '11n';
    case SNOW_DAY  = '13d';
    case SNOW_NIGHT = '13n';
    case MIST_DAY = '50d';
    case MIST_NIGHT = '50n';

    private const FEW_CLOUDS_ICON = '🌤️';
    private const SCATTERED_CLOUDS_ICON = '🌥️';
    private const BROKEN_CLOUDS_ICON = '🌥️';
    private const SHOWER_RAIN_ICON = '🌧️';
    private const RAIN_ICON = '🌧️';
    private const SUN_ICON = '☀️';
    private const MIST_ICON = '🌫️';
    private const SNOW_ICON = '🌨️';
    private const THUNDERSTORM_ICON =  '⛈️';

    public function getEmojiForWeatherCode(): string
    {
        return match ($this->value) {
            '01d', '01n' => self::SUN_ICON,
            '02d', '02n' => self::FEW_CLOUDS_ICON,
            '03d', '03n' => self::SCATTERED_CLOUDS_ICON,
            '04d', '04n' => self::BROKEN_CLOUDS_ICON,
            '09d', '09n' => self::SHOWER_RAIN_ICON,
            '10d', '10n' => self::RAIN_ICON,
            '11d', '11n' => self::THUNDERSTORM_ICON,
            '13d', '13n' => self::SNOW_ICON,
            '50d', '50n' => self::MIST_ICON
        };
    }
}