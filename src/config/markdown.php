<?php

return [

    "route" => "markdowns",

    "markdowns_location" => "markdowns", // Inside the `storage/app` folder.

    "components_view_container" => "mardock::components.atoms.",

    "components_start" => "[",

    "components_end" => "]",

    // Order by priority.

    "components" => [

        /* 
        / **********************************************
        /           Isolated components
        / **********************************************
        */

        [
            "name" => "Codes",
            "regex" => "/^(\`){3}([\S\s]*?)(\`){3}/mi",
            "view_file" => "codes"
        ],

        /* 
        / **********************************************
        /           Inline components
        / **********************************************
        */

        [
            "name" => "highlight",
            "regex" => "/(((\`){3}(.*?)(\`){3})|((\`){2}(.*?)(\`){2})|(\`(.*?)\`))/mi",
            "view_file" => "highlight"
        ],

        /* 
        / **********************************************
        /           Block components
        / **********************************************
        */

        [
            "name" => "mainHeading",
            "regex" => "/^#\s.*$/mi",
            "view_file" => "mainHeading"
        ],
        [
            "name" => "heading",
            "regex" => "/^##\s.*$/mi",
            "view_file" => "heading"
        ],
        [
            "name" => "subHeading",
            "regex" => "/^###\s.*$/mi",
            "view_file" => "subHeading"
        ],

        /* 
        / **********************************************
        /           All affecting components
        / **********************************************
        */

        [
            "name" => "Seperator",
            "regex" => "/(?!\n)^[\s\S]*?$/mi",
            "view_file" => "seperator"
        ]

    ],
];