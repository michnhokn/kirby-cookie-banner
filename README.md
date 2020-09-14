# A Cookie Consent Modal for Kirby3
![Release](https://flat.badgen.net/packagist/v/michnhokn/kirby3-cookie-banner?color=92a9c4)
![Last Commit](https://flat.badgen.net/github/last-commit/michnhokn/kirby3-cookie-banner?color=92c496)

![kirby3-cookie-banner](https://user-images.githubusercontent.com/38752255/93144098-8f499b00-f6e9-11ea-85ab-a639fca0d76a.gif)

## Commercial Usage

This plugin is free but if you use it in a commercial project please consider to
- [buy me a 🍺](https://buymeacoff.ee/michnhokn)

## Installation
- unzip [master.zip](https://github.com/michnhokn/kirby3-cookie-banner/archive/master.zip) as folder `site/pluginskirby3-cookie-banner` or
- `git submodule add https://github.com/michnhokn/kirby3-cookie-banner.git site/plugins/kirby3-cookie-banner` or
- `composer require michnhokn/kirby3-cookie-banner`

## Features
- Add custom options to cookie banner
- You can fully translate the cookie banner ([Custom language variables](https://getkirby.com/docs/guide/languages/custom-language-variables))
- Check the state of the cookie banner via JavaScript events
- Check in code for allowed features

## Setup
To setup the cookie banner just put the `cookie-banner` snippet right befor your closing body tag. Thats it. 🎉
``` php
<?php snippet('cookie-banner') ?>
```
If a selection is made in the cookie modal, a corresponding event is fired on `<body>`.

| Event | Reason |
|---|---|
| `cookies:all` | all cookies are accepted |
| `cookies:deny` | only essential cookies are accepted |
| `cookies:custom` | some cookies are accepted |

Every event contains a comma separated string of selected options.
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

- Better custom theme
- Set up Wiki

---

License: `MIT`

Credits: [MichnHokn](https://github.com/michnhokn)
