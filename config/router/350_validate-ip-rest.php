<?php
/**
 * Validate ip, REST
 */
return [
    "routes" => [
        [
            "info" => "Validate ip with REST.",
            "mount" => "rest",
            "handler" => "\Anax\Validate\ValidateIpRESTController",
        ],
    ]
];
