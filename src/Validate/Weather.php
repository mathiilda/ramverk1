<?php

namespace Anax\Validate;

class Weather
{
    public function getWeatherInfo($lon, $lat)
    {
        try {
            $file = "tokenWeather.txt";
            $token = file_get_contents($file, FILE_USE_INCLUDE_PATH);
        } catch (Exception $e) {
            $token = "000000";
        }

        $curl = curl_init();
        $url = "https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&lang=se&appid=${token}";

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($curl);

        return json_decode($output);
    }
}
