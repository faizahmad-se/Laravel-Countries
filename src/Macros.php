<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Countries;

use Illuminate\Support\Facades\Cache;

class Macros
{
    public function __construct($app)
    {
        if (class_exists('Collective\Html\FormBuilder')) {
            $this->selectCountry($app);
            $this->selectCountryWithId($app);
        }
    }

    public function selectCountry($app)
    {
        $app->form->macro('selectCountry', function ($name, $selected = null, $options = []) use ($app) {
            $countries = Cache::rememberForever('brianfaust.countries.select.name.cca2', function () {
                return Models\Country::get(['name', 'cca2'])->mapWithKeys(function ($item) {
                    return [$item['cca2'] => $item['name']['common']];
                })->sort();
            });

            return $app->form->select($name, $countries, $selected, $options);
        });
    }

    public function selectCountryWithId($app)
    {
        $app->form->macro('selectCountryWithId', function ($name, $selected = null, $options = []) use ($app) {
            $countries = Cache::rememberForever('brianfaust.countries.select.id.cca2', function () {
                return Models\Country::get(['name', 'id'])->mapWithKeys(function ($item) {
                    return [$item['id'] => $item['name']['common']];
                })->sort();
            });

            return $app->form->select($name, $countries, $selected, $options);
        });
    }
}
