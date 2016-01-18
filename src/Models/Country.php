<?php

namespace DraperStudio\Countries\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'name' => 'array',
        'tld' => 'array',
        'currency' => 'array',
        'callingCode' => 'array',
        'altSpellings' => 'array',
        'languages' => 'array',
        'translations' => 'array',
        'latlng' => 'array',
        'landlocked' => 'boolean',
        'borders' => 'array',
        'area' => 'integer',
    ];

    public function scopeName(Builder $query, $value)
    {
        return $query->where('name', '=', $value);
    }

    public function scopeTld(Builder $query, $value)
    {
        return $query->where('tld', '=', $value);
    }

    public function scopeCca2(Builder $query, $value)
    {
        return $query->where('cca2', '=', $value);
    }

    public function scopeCcn3(Builder $query, $value)
    {
        return $query->where('ccn3', '=', $value);
    }

    public function scopeCca3(Builder $query, $value)
    {
        return $query->where('cca3', '=', $value);
    }

    public function scopeCioc(Builder $query, $value)
    {
        return $query->where('cioc', '=', $value);
    }

    public function scopeCurrency(Builder $query, $value)
    {
        return $query->where('currency', '=', $value);
    }

    public function scopeCallingCode(Builder $query, $value)
    {
        return $query->where('callingCode', '=', $value);
    }

    public function scopeCapital(Builder $query, $value)
    {
        return $query->where('capital', '=', $value);
    }

    public function scopeAltSpellings(Builder $query, $value)
    {
        return $query->where('altSpellings', '=', $value);
    }

    public function scopeRegion(Builder $query, $value)
    {
        return $query->where('region', '=', $value);
    }

    public function scopeSubregion(Builder $query, $value)
    {
        return $query->where('subregion', '=', $value);
    }

    public function scopeLanguages(Builder $query, $value)
    {
        return $query->where('languages', '=', $value);
    }

    public function scopeTranslations(Builder $query, $value)
    {
        return $query->where('translations', '=', $value);
    }

    public function scopeLatlng(Builder $query, $value)
    {
        return $query->where('latlng', '=', $value);
    }

    public function scopeDemonym(Builder $query, $value)
    {
        return $query->where('demonym', '=', $value);
    }

    public function scopeLandlocked(Builder $query, $value)
    {
        return $query->where('landlocked', '=', $value);
    }

    public function scopeBorders(Builder $query, $value)
    {
        return $query->where('borders', '=', $value);
    }

    public function scopeArea(Builder $query, $value)
    {
        return $query->where('area', '=', $value);
    }

    public static function listBy($keyColumn, $valueColumn)
    {
        $valueColumnKey = explode('.', $valueColumn)[0];

        return static::get([$keyColumn, $valueColumnKey])->keyBy($keyColumn)->map(function ($item, $keyColumn) use ($valueColumn) {
            return array_get($item->toArray(), $valueColumn);
        });
    }
}
