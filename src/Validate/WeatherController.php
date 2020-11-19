<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class WeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $page = $this->di->get("page");
        $title = "Väder";

        $data = [
            "heading" => $title,
            "action" => "weather/showResult",
            "type" => null
        ];

        $page->add("validate/indexWeather", $data);
        return $page->render([
            "title" => $title,
        ]);
    }

    public function showResultAction()
    {
        $page = $this->di->get("page");
        $title = "Resultat väder";
        $long = $_POST["long"];
        $lat = $_POST["lat"];

        $weatherClass = new Weather();
        $resWeather = $weatherClass->getWeatherInfo($long, $lat);


        // var_dump($resWeather->daily);

        $data = [
            "forecast" => $resWeather->daily ?? "error",
        ];

        $page->add("validate/weatherResult", $data);
        return $page->render([
            "title" => $title,
        ]);
    }
}
