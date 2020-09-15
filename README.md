# A Cookie Consent Modal for Kirby3
![Release](https://flat.badgen.net/packagist/v/michnhokn/kirby3-cookie-banner?color=92a9c4)
![Last Commit](https://flat.badgen.net/github/last-commit/michnhokn/kirby3-cookie-banner?color=92c496)

![kirby3-cookie-banner](https://user-images.githubusercontent.com/38752255/93235175-7ab6e280-f77d-11ea-9b8a-5a8c144344d7.gif)

## Commercial Usage

This plugin is free but if you use it in a commercial project please consider to
- [buy me a 🍺](https://buymeacoff.ee/michnhokn)

## Installation
- unzip [master.zip](https://github.com/michnhokn/kirby3-cookie-banner/archive/master.zip) as folder `site/pluginskirby3-cookie-banner` or
- `git submodule add https://github.com/michnhokn/kirby3-cookie-banner.git site/plugins/kirby3-cookie-banner` or
- `composer require michnhokn/kirby3-cookie-banner`

## Features
- Add custom features to cookie modal
- You can fully translate the cookie banner ([Custom language variables](https://getkirby.com/docs/guide/languages/custom-language-variables))
- Intercept cookie status via JavaScript event
- PHP functions to check for allowed features
- Trigger JavaScript event to update Cookie Modal

## Setup
To setup the cookie banner just put the `cookie-modal` snippet right befor your closing body tag. Thats it. 🎉
``` php
<?php snippet('cookie-modal') ?>
```
If a selection is made an event called `cookies:saved` is triggerd on `<body>`. The included data contains an array of allowed features.
You can set these up in your `config.php` file under `site/config/`.
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

The modal can be recalled and edited by triggering the event `cookies:update` on the `<bod>` tag.

## Methods
- `isFeatureAllowed(string $featureName)` Checks if a user allowed given feature
```php
<?php if (isFeatureAllowed('analytics')): ?>
    <h1>Analytics allowed</h1>
<?php endif; ?>
```
- `getAllowedFeatures()` Get all allowed features or false if nothing is selected
- `clearAllowedFeatures()` Clear all allowed features

## Roadmap
- Add wiki
- Refactor code + add comments

---

License: `MIT`

Credits: [MichnHokn](https://github.com/michnhokn)
