<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Countries;

use DraperStudio\Countries\Console\SeedCountries;
use DraperStudio\Countries\Models\Country;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Class ServiceProvider.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class ServiceProvider extends \DraperStudio\ServiceProvider\ServiceProvider
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
                $countries = Cache::rememberForever('DraperStudio.countries.select.name.cca2', function () {
                    $records = Country::get(['name', 'cca2']);

                    $countries = new Collection();
                    $records->map(function ($item) use (&$countries) {
                        $countries[$item['cca2']] = $item['name']['official'];
                    });

                    return $countries->sort();
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

        $this->app->singleton('command.countries.seed', function (Container $app) {
             return new SeedCountries();
         });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return array_merge(parent::provides(), ['command.countries.seed']);
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
