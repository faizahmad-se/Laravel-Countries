# Laravel Countries

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require draperstudio/laravel-countries
```

And then include the service provider within `app/config/app.php`.

``` php
'providers' => [
    'DraperStudio\Countries\ServiceProvider'
];
```

To get started, you'll need to publish the vendor assets and migrate the countries table:

```bash
php artisan vendor:publish && php artisan migrate
```

Now you can seed the countries into the database like this.

```bash
php artisan countries:seed
```

## Usage

``` php
$skeleton = new League\Skeleton();
echo $skeleton->echoPhrase('Hello, League!');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email hello@draperstudio.tech instead of using the issue tracker.

## Credits

- [DraperStudio][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/DraperStudio/laravel-countries.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/DraperStudio/Laravel-Countries/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/DraperStudio/laravel-countries.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/DraperStudio/laravel-countries.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/DraperStudio/laravel-countries.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/DraperStudio/laravel-countries
[link-travis]: https://travis-ci.org/DraperStudio/Laravel-Countries
[link-scrutinizer]: https://scrutinizer-ci.com/g/DraperStudio/laravel-countries/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/DraperStudio/laravel-countries
[link-downloads]: https://packagist.org/packages/DraperStudio/laravel-countries
[link-author]: https://github.com/DraperStudio
[link-contributors]: ../../contributors
