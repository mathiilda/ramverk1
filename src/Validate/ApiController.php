<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $ip = $_GET["ip"] ?? null;

        if ($ip == null) {
            return "send ip";
        }

        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $result = "Ip-adressen ar giltig.";
            if (gethostbyaddr($ip) != $ip) {
                $domain = gethostbyaddr($ip);
            }
        } else {
            $result = "Ip-adressen ar inte giltig.";
        }

        $json = [
            "result" => $result,
            "domain" => $domain ?? ""
        ];

        return [$json];
    }
}
