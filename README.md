# A Cookie Consent Modal for Kirby3
![kirby3-cookie-banner](https://user-images.githubusercontent.com/38752255/93115811-b178f400-f6bc-11ea-95bb-4e422dbc61a9.gif)


## Installation
```
Download and copy this repository to /site/plugins/kirby3-cookie-banner.
```
OR
```
git submodule add https://github.com/michnhokn/kirby3-cookie-banner.git site/plugins/kirby3-cookie-banner
```
OR
```
composer require michnhokn/kirby3-cookie-banner
```

## Setup
To setup the cookie banner just put the `cookie-banner` snippet right befor your closing body tag. Thats it. 🎉
``` php
<?php snippet('cookie-banner') ?>
</body>
```
If a selection is made in the cookie modal, a corresponding event is fired on `<body>`.

| Event | Reason |
|---|---|
| `cookies:all` | all cookies are accepted |
| `cookies:deny` | only essential cookies are accepted |
| `cookies:custom` | some cookies are accepted |

Every event contains a comma separated string of selected options.

## Options
The text for the cookie modal can be overwritten with the following options.
```php
<?php

return [
    'michnhokn.cookie-banner' => [
        'content' => [
            'title' => 'Cookie Einstellungen',
            'text' => 'Wir nutzen Cookies um [...]',
            'denyAll' => 'Alle ablehnen',
            'acceptAll' => 'Alle annehmen',
            'save' => 'Einstellung speichern',
        ],
    ]
];
```
Additional cookie options can be added as follows.
```php
<?php

return [
    'michnhokn.cookie-banner' => [
        'cookies' => [
            'analytics' => 'Analytics',
            'youtube' => 'YouTube',
        ]
    ]
];
```

## Roadmap

- Translation
- Better custom theme
- Better Wiki

## Development

```
npm i -g parcel-bundler
npm install
npm run dev
```

## License

MIT

## Credits

- [MichnHokn](https://github.com/michnhokn)
