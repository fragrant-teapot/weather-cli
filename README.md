# Weather CLI 🌥

Simple php application printing current weather in a given city

## Usage

```bash
./weather <cityName>

./weather Berlin  
```

## Setup

1. clone this repo
2. `cd weather-cli`
3. `docker compose build`
4. `docker compose run --rm composer composer install"`
5. `docker compose run --rm php ./setup` You will be asked for Open Weather Map API key, generate one [here](https://home.openweathermap.org/api_keys)
6. `sudo chown -R ${USER}:${USER} ./`
7. `docker compose run --rm php ./weather Brussels`

## Sources

Included test data pulled from Open Weather Map's [Weather API](https://openweathermap.org/current#rectangle) 
and shared under [CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0/legalcode) without any modifications