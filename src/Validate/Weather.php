<?php

namespace Anax\Validate;

class Weather
{
    public function getWeatherInfo($ipAdress)
    {
        $geo = new Geo();
        $res = $geo->getGeo($ipAdress);
        $latlon = explode(",", $res->loc);

        $lat = $latlon[0];
        $lon = $latlon[1];

        try {
            $keys = require ("../config/keys.php");
            $token = $keys["weather"];
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
