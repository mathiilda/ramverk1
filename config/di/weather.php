<?php
/**
 * Weather-class.
 */
return [

    // Services to add to the container.
    "services" => [
        "weather" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \mabw\Validate\Weather();
                $obj->setDi($this);
                return $obj;
            }
        ],
    ],
];
