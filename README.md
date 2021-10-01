# Weather CLI 🌥

Simple php application printing current weather in a given city

## Usage

```bash
./weather <cityName>

./weather Berlin
```

## Setup

1. `docker-compose up -d`
2. `docker-compose run php ./setup`
3. `docker-compose run php ./weather Brussels`

## Sources

Included test data pulled from Open Weather Map's [Weather API](https://openweathermap.org/current#rectangle) 
and shared under [CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0/legalcode) without any modifications