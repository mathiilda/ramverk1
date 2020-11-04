<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $ipAddress = $_GET["ip"] ?? null;

        if ($ipAddress == null) {
            return "Det fattas en ip-adress.";
        }

        if (filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            $result = "Ip-adressen ar giltig.";
            if (gethostbyaddr($ipAddress) != $ipAddress) {
                $domain = gethostbyaddr($ipAddress);
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
