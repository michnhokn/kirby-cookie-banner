<?php

@include_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/CookieMethods.php';

Kirby::plugin('michnhokn/cookie-banner', [
    'snippets' => [
        'cookie-banner' => __DIR__ . '/snippets/cookie-banner.php',
        'cookie-banner-option' => __DIR__ . '/snippets/cookie-banner-option.php',
    ],
    'translations' => [
        'de' => [
            'michnhokn.cookie-banner.title' => 'Cookie Einstellungen',
            'michnhokn.cookie-banner.text' => 'Wir nutzen Cookies um Dir die bestmögliche Erfahrung zu bieten. Außerdem können wir damit das Verhalten der Benutzer analysieren um die Webseite stetig für Dich zu verbessern. (link: datenschutz text: Datenschutz)',
            'michnhokn.cookie-banner.essentialText' => 'Essentiell',
            'michnhokn.cookie-banner.denyAll' => 'Alle ablehnen',
            'michnhokn.cookie-banner.acceptAll' => 'Alle annehmen',
            'michnhokn.cookie-banner.save' => 'Einstellung speichern',
        ],
        'en' => [
            'michnhokn.cookie-banner.title' => 'Cookie settings',
            'michnhokn.cookie-banner.text' => 'We use cookies to provide you with the best possible experience. They also allow us to analyze user behavior in order to constantly improve the website for you. (link: privacy-policy text: Privacy Policy)',
            'michnhokn.cookie-banner.essentialText' => 'Essential',
            'michnhokn.cookie-banner.denyAll' => 'Reject All',
            'michnhokn.cookie-banner.acceptAll' => 'Accept All',
            'michnhokn.cookie-banner.save' => 'Save settings',
        ]
    ],
    'options' => [
        'features' => []
    ]
]);
