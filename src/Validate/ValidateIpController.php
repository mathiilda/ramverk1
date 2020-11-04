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
        $ip = $_GET["ip"];


        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $result = "Ip-adressen är giltig.";
            if (gethostbyaddr($ip) != $ip) {
                $domain = gethostbyaddr($ip);
            }
        } else {
            $result = "Ip-adressen är inte giltig.";
        }

        $data = [
            "result" => $result,
            "domain" => $domain ?? null
        ];

        
        $page->add("validate/result", $data);
        return $page->render([
            "title" => $title,
        ]);
    }
}
