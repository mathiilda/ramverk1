<?php
/**
 * Validate ip
 */
return [
    "routes" => [
        [
            "info" => "Validate ip.",
            "mount" => "validate",
            "handler" => "\Anax\Validate\ValidateIpController",
        ],
    ]
];
