# Rocketeer Acme Plugin

[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/rocketeers/rocketeer-laravel?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

[![Build Status](http://img.shields.io/travis/rocketeers/rocketeer-laravel.svg?style=flat-square)](https://travis-ci.org/rocketeers/rocketeer-laravel)
[![Latest Stable Version](http://img.shields.io/packagist/v/anahkiasen/rocketeer-laravel.svg?style=flat-square)](https://packagist.org/rocketeer-laravels/anahkiasen/rocketeer-laravel)
[![Total Downloads](http://img.shields.io/packagist/dt/anahkiasen/rocketeer-laravel.svg?style=flat-square)](https://packagist.org/rocketeer-laravels/anahkiasen/rocketeer-laravel)
[![Support via Gittip](http://img.shields.io/gittip/Anahkiasen.svg?style=flat-square)](https://www.gittip.com/Anahkiasen/)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ rocketeer plugin:install rocketeers/rocketeer-laravel
```

## Usage

The plugin adds the Artisan binary accessible from any task or strategy:

```php
$this->artisan()->runForCurrentRelease('cache:clear');
```

It also adds two strategies:

- Check:Laravel: extends the PHP check strategy but adds a few checks related to your application
- Migrate:Artisan: uses Artisan to migrate your database

## Testing

``` bash
$ phpunit
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
