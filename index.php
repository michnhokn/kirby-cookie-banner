<?php

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('michnhokn/cookie-banner', [
    'snippets' => [
        'cookie-banner' => __DIR__ . '/snippets/cookie-banner.php'
    ],
    'options' => [
        'content' => [
            'title' => 'Cookie Einstellungen',
            'text' => 'Wir nutzen Cookies um Dir die bestmögliche Erfahrung zu bieten. Außerdem können wir damit das Verhalten der Benutzer analysieren um die Webseite stetig für Dich zu verbessern.',
            'denyAll' => 'Alle ablehnen',
            'acceptAll' => 'Alle annehmen',
            'save' => 'Einstellung speichern',
        ],
        'cookies' => [
            'analytics' => 'Analytics',
        ]
    ]
]);
