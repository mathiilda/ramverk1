<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ValidateIpController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $page = $this->di->get("page");
        $title = "Validera ip";

        $data = [
            "heading" => $title,
            "action" => "validate/showResult",
            "json" => false
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

        if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $result = "Ip-adressen är giltig.";
            $type = "ip6";

            if (gethostbyaddr($ipAddress) != $ipAddress) {
                $domain = gethostbyaddr($ipAddress);
            }
        } else if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $result = "Ip-adressen är giltig.";
            $type = "ip4";

            if (gethostbyaddr($ipAddress) != $ipAddress) {
                $domain = gethostbyaddr($ipAddress);
            }
        } else {
            $result = "Ip-adressen är inte giltig.";
        }

        $data = [
            "ip" => $ipAddress,
            "result" => $result,
            "type" => $type ?? "-",
            "domain" => $domain ?? "-"
        ];

        
        $page->add("validate/result", $data);
        return $page->render([
            "title" => $title,
        ]);
    }
}
