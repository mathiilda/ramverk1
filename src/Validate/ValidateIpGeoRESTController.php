<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ValidateIpGeoRESTController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function getJson($ipAddress)
    {
        $curl = curl_init();
        $url = $this->di->request->getBaseUrl() . "/apiGeo";

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "ip=" . $ipAddress);
        $output = curl_exec($curl);
        curl_close($curl);

        return $output;
    }

    public function indexAction()
    {
        $page = $this->di->get("page");
        $title = "Få geografisk position för ip-adress (REST)";

        $data = [
            "heading" => $title,
            "action" => "geoRest/showResult",
            "type" => "geoRest",
            "placeholder" => $_SERVER['REMOTE_ADDR'],
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
        $ipAddress = $_POST["ip"];

        $data = [
            "result" => $this->getJson($ipAddress)
        ];
        
        $page->add("validate/restResult", $data);
        return $page->render([
            "title" => $title,
        ]);
    }
}
