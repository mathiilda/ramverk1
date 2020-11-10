<?php
/**
 * Api for validation of ip.
 */
return [
    "routes" => [
        [
            "info" => "Ip api+geo.",
            "mount" => "apiGeo",
            "handler" => "\Anax\Validate\ApiGeoController",
        ],
    ]
];
