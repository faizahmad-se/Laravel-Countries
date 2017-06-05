<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Countries;

use Illuminate\Support\ServiceProvider;

class CountriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../config/laravel-countries.php' => config_path('laravel-countries.php'),
        ], 'config');

        new Macros($this->app);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-countries.php', 'laravel-countries');

        $this->commands([
            Console\Commands\SeedCountries::class,
            Console\Commands\SeedCurrencies::class,
            Console\Commands\SeedTimezones::class,
            Console\Commands\SeedTaxRates::class,
        ]);
    }
}
