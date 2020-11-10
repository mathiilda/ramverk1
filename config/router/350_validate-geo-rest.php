<?php
/**
 * Validate ip, REST
 */
return [
    "routes" => [
        [
            "info" => "Validate ip with REST.",
            "mount" => "geoRest",
            "handler" => "\Anax\Validate\ValidateIpGeoRESTController",
        ],
    ]
];
