<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ApiController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $ipAddress = $_POST["ip"] ?? null;

        if ($ipAddress == null) {
            return "Det fattas en ip-adress.";
        }

        if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $result = "Ip-adressen ar giltig.";
            $type = "ip6";

            if (gethostbyaddr($ipAddress) != $ipAddress) {
                $domain = gethostbyaddr($ipAddress);
            }
        } else if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $result = "Ip-adressen ar giltig.";
            $type = "ip4";

            if (gethostbyaddr($ipAddress) != $ipAddress) {
                $domain = gethostbyaddr($ipAddress);
            }
        } else {
            $result = "Ip-adressen ar inte giltig.";
        }

        $json = [
            "ip" => $ipAddress,
            "result" => $result,
            "type" => $type ?? "-",
            "domain" => $domain ?? "-"
        ];

        return [$json];
    }
}
