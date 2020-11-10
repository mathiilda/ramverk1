<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ApiGeoController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $ipClass = new Ip();
        $geoClass = new Geo();
        $ipAddress = $_POST["ip"] ?? null;

        if ($ipAddress == null) {
            return "Det fattas en ip-adress.";
        }

        $resIp = $ipClass->getIpInfo($ipAddress);
        $resJson = $geoClass->getGeo($ipAddress);

        $json = [
            "ip" => $ipAddress,
            "result" => $resIp[0],
            "type" => $resIp[1],
            "domain" => $resIp[2],
            "loc" => $resJson->loc ?? "-",
            "region" => $resJson->region ?? "-",
            "city" => $resJson->city ?? "-",
            "country" => $resJson->country ?? "-",
        ];

        return [$json];
    }
}
