<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Eloquent Models
    |--------------------------------------------------------------------------
    */

    'models' => [

        /*
        |--------------------------------------------------------------------------
        | Country Model
        |--------------------------------------------------------------------------
        */

       'country' => BrianFaust\Countries\Models\Country::class,

        /*
        |--------------------------------------------------------------------------
        | Currency Model
        |--------------------------------------------------------------------------
        */

       'currency' => BrianFaust\Countries\Models\Currency::class,

        /*
        |--------------------------------------------------------------------------
        | Timezone Model
        |--------------------------------------------------------------------------
        */

       'timezone' => BrianFaust\Countries\Models\Timezone::class,

        /*
        |--------------------------------------------------------------------------
        | Timezone Model
        |--------------------------------------------------------------------------
        */

       'taxrate' => BrianFaust\Countries\Models\TaxRate::class,

    ],

];
