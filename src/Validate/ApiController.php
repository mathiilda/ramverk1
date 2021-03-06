<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $ipClass = new Ip();
        $ipAddress = $_POST["ip"] ?? null;

        if ($ipAddress == null) {
            return "Det fattas en ip-adress.";
        }

        $resIp = $ipClass->getIpInfo($ipAddress);

        $json = [
            "ip" => $ipAddress,
            "result" => $resIp[0],
            "type" => $resIp[1],
            "domain" => $resIp[2]
        ];

        return [$json];
    }
}
