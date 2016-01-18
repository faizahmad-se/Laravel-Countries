<?php

namespace DraperStudio\Countries;

use DraperStudio\Countries\Console\SeedCountries;
use DraperStudio\Countries\Models\Country;
use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'countries';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations();

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

    public function register()
    {
        $this->commands(SeedCountries::class);
    }
}
