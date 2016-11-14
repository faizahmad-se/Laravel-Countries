<?php

namespace BrianFaust\Countries;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use BrianFaust\ServiceProvider\ServiceProvider;

class CountriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        parent::boot();

        $this->publishMigrations();

        $app = $this->app;

        if ($app->bound('form')) {
            $app->form->macro('selectCountry', function ($name, $selected = null, $options = []) use ($app) {
                $countries = Cache::rememberForever('brianfaust.countries.select.name.cca2', function () {
                    return Country::get(['name', 'cca2'])->mapWithKeys(function ($item) {
                        return [$item['cca2'] => $item['name']['common']];
                    })->sort();
                });

                return $app->form->select($name, $countries, $selected, $options);
            });

            $app->form->macro('selectCountryWithId', function ($name, $selected = null, $options = []) use ($app) {
                $countries = Cache::rememberForever('brianfaust.countries.select.id.cca2', function () {
                    return Country::get(['name', 'id'])->mapWithKeys(function ($item) {
                        return [$item['id'] => $item['name']['common']];
                    })->sort();
                });

                return $app->form->select($name, $countries, $selected, $options);
            });
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        parent::register();

        $this->commands(SeedCountries::class);
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName()
    {
        return 'countries';
    }
}
