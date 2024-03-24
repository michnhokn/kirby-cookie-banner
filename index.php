<?php

use Kirby\Cms\App;
use Kirby\Data\Json;
use Kirby\Filesystem\F;
use Kirby\Toolkit\Str;
use Michnhokn\CookieBanner;

F::loadClasses(['Michnhokn\CookieBanner' => __DIR__ . '/CookieBanner.php']);

try {
    $germanTranslations = Json::read(__DIR__ . "/translations/de.json");
    $englishTranslations = Json::read(__DIR__ . "/translations/en.json");

    // support for use without option "languages => true"
    $cookieBannerTranslations = [];
    foreach ($germanTranslations as $key => $translation) {
        $cookieBannerTranslations[Str::replace($key, 'michnhokn.cookie-banner.', '')] = $translation;
    }
} catch (Exception $exception) {
}

App::plugin('michnhokn/cookie-banner', [
    'snippets' => [
        'cookie-modal' => __DIR__ . '/snippets/cookie-modal.php',
        'cookie-modal-option' => __DIR__ . '/snippets/cookie-modal-option.php',
    ],
    'translations' => [
        'de' => $germanTranslations ?? [],
        'en' => $englishTranslations ?? []
    ],
    'options' => [
        'features' => [],
        'translations' => $cookieBannerTranslations ?? []
    ],
    'assets' => [
        'cookie-banner.js' => CookieBanner::realAsset('js'),
        'cookie-banner.css' => CookieBanner::realAsset('css'),
    ]
]);
