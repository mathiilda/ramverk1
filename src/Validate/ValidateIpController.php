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
        $title = "Validate ip";

        $page->add("validate/index");
        return $page->render([
            "title" => $title,
        ]);
    }

    public function showResultAction()
    {
        $page = $this->di->get("page");
        $title = "Result ip";

        $ip = $_GET["ip"];

        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $result = "The ip address is valid.";
            if (gethostbyaddr($ip) != $ip) {
                $domain = gethostbyaddr($ip);
            }
        } else {
            $result = "The ip address is not valid.";
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
