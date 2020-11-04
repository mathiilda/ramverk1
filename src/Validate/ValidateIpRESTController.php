<?php

namespace Anax\Validate;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

class ValidateIpRESTController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        $page = $this->di->get("page");
        $title = "Validera ip (REST)";

        $data = [
            "heading" => $title,
            "action" => "rest/showResult",
            "json" => "Svaret kommer att skrivas ut som JSON."
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

        $ip = $_GET["ip"];

        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $result = "Ip-adressen ar giltig.";
            if (gethostbyaddr($ip) != $ip) {
                $domain = gethostbyaddr($ip);
            }
        } else {
            $result = "Ip-adressen ar inte giltig.";
        }

        $data = [
            "result" => $result,
            "domain" => $domain ?? ""
        ];
        
        $page->add("validate/restResult", $data);
        return $page->render([
            "title" => $title,
        ]);
    }
}
