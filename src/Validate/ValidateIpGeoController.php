<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ValidateIpGeoController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $page = $this->di->get("page");
        $title = "Få geografisk position för ip-adress";

        $data = [
            "heading" => $title,
            "action" => "geo/showResult",
            "type" => "geo",
            "placeholder" => $_SERVER['REMOTE_ADDR'] ?? ""
        ];

        $page->add("validate/index", $data);
        return $page->render([
            "title" => $title,
        ]);
    }

    public function showResultAction()
    {
        $page = $this->di->get("page");
        $title = "Resultat ip";
        $ipAddress = $_POST["ip"];
        $geoClass = new GeoA();
        $ipClass = new Ip();

        $resIp = $ipClass->getIpInfo($ipAddress);
        $resJson = $geoClass->getGeo($ipAddress);

        $data = [
            "ip" => $ipAddress,
            "result" => $resIp[0],
            "type" => $resIp[1],
            "domain" => $resIp[2],
            "loc" => $resJson->loc ?? "-",
            "region" => $resJson->region ?? "-",
            "city" => $resJson->city ?? "-",
            "country" => $resJson->country ?? "-",
        ];

        
        $page->add("validate/geoResult", $data);
        return $page->render([
            "title" => $title,
        ]);
    }
}
