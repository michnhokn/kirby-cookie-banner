# A Cookie Consent Modal for Kirby3

![Release](https://flat.badgen.net/packagist/v/michnhokn/kirby3-cookie-banner?color=92a9c4)
![Last Commit](https://flat.badgen.net/github/last-commit/michnhokn/kirby3-cookie-banner?color=92c496)

![kirby3-cookie-banner](https://user-images.githubusercontent.com/38752255/93235175-7ab6e280-f77d-11ea-9b8a-5a8c144344d7.gif)

## Commercial Usage

This plugin is free but if you use it in a commercial project please consider to

- [buy me a 🍺](https://buymeacoff.ee/michnhokn)

## Installation

- unzip [master.zip](https://github.com/michnhokn/kirby3-cookie-banner/archive/master.zip) as
  folder `site/plugins/kirby3-cookie-banner` or
- `git submodule add https://github.com/michnhokn/kirby3-cookie-banner.git site/plugins/kirby3-cookie-banner` or
- `composer require michnhokn/kirby3-cookie-banner`

## Features

- Add a custom cookie consent modal
- Fully [translatable](https://github.com/michnhokn/kirby3-cookie-banner/wiki/02-Translate-the-modal).
- [Intercept](https://github.com/michnhokn/kirby3-cookie-banner/wiki/01-How-to-set-it-up#-intercept-changes-to-the-cookie-settings)
  cookie status
- [PHP functions](https://github.com/michnhokn/kirby3-cookie-banner/wiki/03-PHP-functions) to check for allowed features

For more features check out the [wiki](https://github.com/michnhokn/kirby3-cookie-banner/wiki).

## Setup

1. Put the `cookie-modal` snippet right before the closing body tag.
    ```` php
    <?php snippet('cookie-modal', [
        'assets' => true,
        'showOnFirst' => true,
        'features' => [...],
    ]) ?>
    ````
2. Set up your features for the cookie modal.
    ````php
    return [
        'michnhokn.cookie-banner' => [
            'features' => [
                'analytics' => 'Analytics',
                'mapbox' => 'Mapbox'
            ]
        ]
    ];
    ````
3. Listen for the `cookied:saved` event and receive an `array` of allowed features.
   ````javascript
   u('body').on('cookies:saved', event => {
       console.log('Saved cookie features:', event.detail);
   })
   ````

4. Alternatively modify your script tags to use `type="text/plain"` (to prevent immediate execution) and add `data-cookie-feature="feature-identifier"` with the identifier of a configured feature.
   ````html
    <script src="https://service.tld/analytics.js" type="text/plain" data-cookie-feature="analytics"></script>
    ````
   This script will only be loaded and executed when the declared cookie feature `analytics` gets activated through the cookie banner by the user. Also on page load the activation state will be checked and if positive the script will be loaded and executed as well. If the user deactivates a priorly activated feature, the current page will be reloaded to remove all scripts of that feature from the page.

Learn more in the [wiki](https://github.com/michnhokn/kirby3-cookie-banner/wiki/01-How-to-set-it-up).

## Methods

See all available functions in the [wiki](https://github.com/michnhokn/kirby3-cookie-banner/wiki/03-PHP-functions).

## Misc

**Roadmap**: Have a look at this [project](https://github.com/michnhokn/kirby3-cookie-banner/projects/1).

**License**: `MIT`

**Credits**: [MichnHokn](https://github.com/michnhokn)
