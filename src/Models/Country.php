<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Countries\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'tld',
        'cca2',
        'ccn3',
        'cca3',
        'cioc',
        'currency',
        'callingCode',
        'capital',
        'altSpellings',
        'region',
        'subregion',
        'languages',
        'translations',
        'latlng',
        'demonym',
        'landlocked',
        'borders',
        'area',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'         => 'array',
        'tld'          => 'array',
        'currency'     => 'array',
        'callingCode'  => 'array',
        'altSpellings' => 'array',
        'languages'    => 'array',
        'translations' => 'array',
        'latlng'       => 'array',
        'landlocked'   => 'boolean',
        'borders'      => 'array',
        'area'         => 'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function currencies(): HasMany
    {
        return $this->hasMany(config('countries.models.currency'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function timezones(): HasMany
    {
        return $this->hasMany(config('countries.models.timezone'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function taxrate(): HasOne
    {
        return $this->hasOne(config('countries.models.taxrate'));
    }

    /**
     * @param $keyColumn
     * @param $valueColumn
     *
     * @return mixed
     */
    public static function listBy($keyColumn, $valueColumn)
    {
        $valueColumnKey = explode('.', $valueColumn)[0];

        return static::get([$keyColumn, $valueColumnKey])->keyBy($keyColumn)->map(function ($item, $keyColumn) use ($valueColumn) {
            return array_get($item->toArray(), $valueColumn);
        });
    }
}
