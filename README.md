# Rocketeer Laravel integration

## Installation

```shell
$ rocketeer plugin:install rocketeers/rocketeer-laravel
```

Then add this to the `plugins.loaded` array in your configuration:

```php
<?php
'loaded' => [
    'Rocketeer\Plugins\Laravel\Laravel',
],
```

## Usage

The plugin adds the Artisan binary accessible from any task or strategy:

```php
$this->artisan()->runForCurrentRelease('cache:clear');
```

It also adds two strategies:

- Check:Laravel: extends the PHP check strategy but adds a few checks related to your application
- Migrate:Artisan: uses Artisan to migrate your database
