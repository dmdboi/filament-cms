<?php

return [
    /*
     * ---------------------------------------------------
     * Allow Features
     * ---------------------------------------------------
     */
    "features" => [
        "comments" => false,
        "forms" => false,
        "form_requests" => false,
        "apis" => false,
    ],

    /*
     * ---------------------------------------------------
     * Youtube Integration For Posts Meta
     * ---------------------------------------------------
     */
    "youtube_key" => env('YOUTUBE_KEY', null),

    /*
     * ---------------------------------------------------
     * Supported Lanuages For Content
     * ---------------------------------------------------
     */
    "lang" => [
        "en" => "English"
    ],

    "themes" => [
        "scan" => true,
        "sections" => [
            "/vendor/tomatophp/filament-cms/src/Sections"
        ]
    ]
];
