# Filament Sound

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ibrahimbougaoua/filament-sound.svg?style=flat-square)](https://packagist.org/packages/ibrahimbougaoua/filament-sound)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ibrahimbougaoua/filament-sound/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ibrahimbougaoua/filament-sound/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ibrahimbougaoua/filament-sound/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ibrahimbougaoua/filament-sound/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ibrahimbougaoua/filament-sound.svg?style=flat-square)](https://packagist.org/packages/ibrahimbougaoua/filament-sound)

FilamentSound is a Laravel package that enhances the Filament CRUD framework by adding sound-playing functionality. It allows developers to integrate audio notifications or feedback into their applications following CRUD operations. With FilamentSound, you can configure the package to play custom sound effects, such as success chimes or error alerts, after data creation, update, or deletion.

The package provides a simple and convenient way to incorporate auditory cues into your application's user experience. By utilizing the Web Audio API and event listeners, FilamentSound detects successful CRUD operations and triggers the corresponding sound effect in response. This helps users receive immediate feedback and acknowledgment when performing actions like creating new records, updating existing data, or deleting entries.

FilamentSound includes a configuration file that allows developers to specify the path to their sound files or customize other settings. The package's assets, including the provided sound files, can be easily published and integrated into the Laravel application using Laravel's asset publishing feature.

With FilamentSound, you can enhance the interactivity and user engagement of your Filament-powered applications by incorporating audio notifications, providing a more immersive and dynamic user experience.

## Installation

You can install the package via composer:

```bash
composer require ibrahimbougaoua/filament-sound
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-sound-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-sound-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-sound-views"
```

## Usage

```php
$filamentSound = new FilamentSound\FilamentSound();
echo $filamentSound->echoPhrase('Hello, FilamentSound!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ibrahim](https://github.com/ibrahimBougaoua)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
