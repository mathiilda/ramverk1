<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ApiWeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        // $weatherClass = new Weather();
        $weatherClass = $this->di->get("weather");
        $geoClass = new Geo();
        $ipAddress = $_POST["ip"] ?? null;

        if ($ipAddress == null) {
            return "Det fattas en ip-adress.";
        }

        $resWeather = $weatherClass->getWeatherInfo($ipAddress);
        $resHistWeather = $weatherClass->getHistoricalWeatherInfo($ipAddress);
        $resJson = $geoClass->getGeo($ipAddress);

        $weatherArray = [];
        $historyArray = [];
        $resHistoryArray = [];
        
        foreach ($resWeather->daily as $day) {
            array_push($weatherArray, [gmdate("Y-m-d", $day->dt) => $day->weather[0]->description]);
        };

        for ($i=0; $i < 5; $i++) {
            array_push($historyArray, json_decode($resHistWeather[$i]));
        }

        foreach ($historyArray as $day) {
            array_push($resHistoryArray, [gmdate("Y-m-d", $day->current->dt) => $day->current->weather[0]->description]);
        };

        $json = [
            "ip" => $ipAddress,
            "history" => $resHistoryArray ?? "-",
            "forecast" => $weatherArray ?? "-",
            "loc" => $resJson->loc ?? "-",
            "region" => $resJson->region ?? "-",
            "city" => $resJson->city ?? "-",
            "country" => $resJson->country ?? "-",
        ];

        return [$json];
    }
}
