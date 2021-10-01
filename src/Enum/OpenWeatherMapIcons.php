<?php

declare(strict_types=1);

namespace App\Enum;

class OpenWeatherMapIcons //todo rewrite with proper enum once 8.1 gets released...
{
    private const FEW_CLOUDS = '⛅';
    private const SCATTERED_CLOUDS = '🌥️';
    private const BROKEN_CLOUDS = '🌥️';
    private const SHOWER_RAIN = '🌧️';
    private const RAIN = '🌧️';
    private const THUNDERSTORM = '⛈️';
    private const SNOW = '🌨️';
    private const MIST = '🌫️';
    private const CLEAR_SKY = '☀️';

    private const EMOJI_TABLE = [
        '11d' => self::THUNDERSTORM,
        '11n' => self::THUNDERSTORM,
        '09d' => self::SHOWER_RAIN,
        '09n' => self::SHOWER_RAIN,
        '10d' => self::RAIN,
        '10n' => self::RAIN,
        '13d' => self::SNOW,
        '13n' => self::SNOW,
        '50d' => self::MIST,
        '50n' => self::MIST,
        '01d' => self::CLEAR_SKY,
        '01n' => self::CLEAR_SKY,
        '02d' => self::FEW_CLOUDS,
        '02n' => self::FEW_CLOUDS,
        '03d' => self::SCATTERED_CLOUDS,
        '03n' => self::SCATTERED_CLOUDS,
        '04d' => self::BROKEN_CLOUDS,
        '04n' => self::BROKEN_CLOUDS
    ];

    public static function getEmojiForWeatherCode(string $code): string
    {
        if(isset(self::EMOJI_TABLE[$code])) {
            return self::EMOJI_TABLE[$code];
        }

        return $code;
    }
}