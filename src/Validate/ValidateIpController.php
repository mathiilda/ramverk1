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
            "type" => null
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

        $ipClass = new Ip();
        $resIp = $ipClass->getIpInfo($ipAddress);

        $data = [
            "ip" => $ipAddress,
            "result" => $resIp[0],
            "type" => $resIp[1],
            "domain" => $resIp[2]
        ];

        $page->add("validate/result", $data);
        return $page->render([
            "title" => $title,
        ]);
    }
}
