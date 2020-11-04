<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ValidateIpRESTController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function getJson($ipAddress)
    {
        $curl = curl_init();
        $url = $this->di->request->getBaseUrl() . "/api?ip=" . $ipAddress;

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);

        return $output;
    }

    public function indexAction()
    {
        $page = $this->di->get("page");
        $title = "Validera ip (REST)";

        $data = [
            "heading" => $title,
            "action" => "rest/showResult",
            "json" => true
        ];

        $page->add("validate/index", $data);
        return $page->render([
            "title" => $title,
        ]);
    }

    public function showResultAction()
    {
        $page = $this->di->get("page");
        $title = "Resultat ip (REST)";
        $ipAddress = $_GET["ip"];

        $data = [
            "result" => $this->getJson($ipAddress)
        ];
        
        $page->add("validate/restResult", $data);
        return $page->render([
            "title" => $title,
        ]);
    }
}
