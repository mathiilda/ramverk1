<?php
/**
 * Supply the basis for the navbar as an array.
 */
return [
    // Use for styling the menu
    "wrapper" => null,
    "class" => "my-navbar rm-default rm-desktop",
 
    // Here comes the menu items
    "items" => [
        [
            "text" => "Hem",
            "url" => "",
            "title" => "Första sidan, börja här.",
        ],
        [
            "text" => "Redovisning",
            "url" => "redovisning",
            "title" => "Redovisningstexter från kursmomenten.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Kmom01",
                        "url" => "redovisning/kmom01",
                        "title" => "Redovisning för kmom01.",
                    ],
                    [
                        "text" => "Kmom02",
                        "url" => "redovisning/kmom02",
                        "title" => "Redovisning för kmom02.",
                    ],
                ],
            ],
        ],
        [
            "text" => "Om",
            "url" => "om",
            "title" => "Om denna webbplats.",
        ],
        [
            "text" => "Styleväljare",
            "url" => "style",
            "title" => "Välj stylesheet.",
        ],
        [
            "text" => "Verktyg",
            "url" => "verktyg",
            "title" => "Verktyg och möjligheter för utveckling.",
        ],
        [
            "text" => "REST",
            "url" => "rest",
            "title" => "REST-apier.",
            "submenu" => [
                "items" => [
                    [
                        "text" => "Validera ip (REST)",
                        "url" => "rest",
                        "title" => "Validera ip-adresser med REST.",
                    ],
                    [
                        "text" => "Geo för ip (REST)",
                        "url" => "geoRest",
                        "title" => "Få geografisk position för ip-adresser med REST.",
                    ],
                    [
                        "text" => "Väder (REST)",
                        "url" => "weatherRest",
                        "title" => "Få kommande väder men ip-adress (REST).",
                    ],
                ],
            ],
        ],
        [
            "text" => "Validera Ip",
            "url" => "validate",
            "title" => "Validera ip-adresser.",
        ],
        [
            "text" => "Geo för Ip",
            "url" => "geo",
            "title" => "Få geografisk position för ip-adresser.",
        ],
        [
            "text" => "Väder",
            "url" => "weather",
            "title" => "Få kommande väder men ip-adress.",
        ],
        [
            "text" => "Book",
            "url" => "book",
            "title" => "CRUD bok-databas",
        ],
    ],
];
