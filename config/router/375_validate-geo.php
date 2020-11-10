<?php
/**
 * Validate ip
 */
return [
    "routes" => [
        [
            "info" => "Validate ip+geo.",
            "mount" => "geo",
            "handler" => "\Anax\Validate\ValidateIpGeoController",
        ],
    ]
];
