# A Cookie Consent Modal for Kirby3
![Release](https://flat.badgen.net/packagist/v/michnhokn/kirby3-cookie-banner?color=92a9c4)
![Last Commit](https://flat.badgen.net/github/last-commit/michnhokn/kirby3-cookie-banner?color=92c496)
![kirby3-cookie-banner](https://user-images.githubusercontent.com/38752255/93115811-b178f400-f6bc-11ea-95bb-4e422dbc61a9.gif)

## Commercial Usage

This plugin is free but if you use it in a commercial project please consider to 
- [buy me a 🍺](https://buymeacoff.ee/michnhokn)

## Installation
- unzip [master.zip](https://github.com/michnhokn/kirby3-cookie-banner/archive/master.zip) as folder `site/pluginskirby3-cookie-banner` or
- `git submodule add https://github.com/michnhokn/kirby3-cookie-banner.git site/plugins/kirby3-cookie-banner` or
- `composer require michnhokn/kirby3-cookie-banner`

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

## Options
| Option | Use |
|---|---|
| `content.title` | modal title |
| `content.text` | description text of modal |
| `content.denyAll` | button text of _deny all_ button |
| `content.acceptAll` | button text of _acceppt all_ button |
| `content.save` | button text of _save_ button |
| `cookies` | `array` of available cookie options. **default**: `['analytics' => 'Analytics']` | 


## Roadmap

- PHP functions
- Translation
- Better custom theme
- Better Wiki

---

License: `MIT`

Credits: [MichnHokn](https://github.com/michnhokn)
