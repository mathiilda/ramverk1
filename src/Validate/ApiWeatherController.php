<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ApiWeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $weatherClass = new Weather();
        $geoClass = new Geo();
        $ipAddress = $_POST["ip"] ?? null;

        if ($ipAddress == null) {
            return "Det fattas en ip-adress.";
        }

        $resWeather = $weatherClass->getWeatherInfo($ipAddress);
        $resJson = $geoClass->getGeo($ipAddress);

        $weatherArray = [];

        foreach ($resWeather->daily as $day) {
            array_push($weatherArray, [gmdate("Y-m-d", $day->dt) => $day->weather[0]->description]);
        };

        $json = [
            "ip" => $ipAddress,
            "weather" => $weatherArray ?? "-",
            "loc" => $resJson->loc ?? "-",
            "region" => $resJson->region ?? "-",
            "city" => $resJson->city ?? "-",
            "country" => $resJson->country ?? "-",
        ];

        return [$json];
    }
}
