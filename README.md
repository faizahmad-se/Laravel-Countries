# Laravel Countries

## Installation

First, pull in the package through Composer.

```js
composer require draperstudio/laravel-countries:1.0.*@dev
```

And then include the service provider within `app/config/app.php`.

```php
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
