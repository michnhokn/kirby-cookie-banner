<?php

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('michnhokn/cookie-banner', [
    'snippets' => [
        'cookie-banner' => __DIR__ . '/snippets/cookie-banner.php'
    ],
    'options' => [
        'content' => [
            'title' => 'Cookie Einstellungen',
            'text' => 'Wir nutzen Cookies ... Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam',
            'denyAll' => 'Alle ablehnen',
            'acceptAll' => 'Alle annehmen',
            'save' => 'Einstellung speichern',
        ],
        'cookies' => [
            'analytics' => 'Analytics',
        ]
    ]
]);
