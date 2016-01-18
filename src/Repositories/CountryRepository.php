<?php

namespace DraperStudio\Countries\Repositories;

use DraperStudio\Countries\Models\Country;
use DraperStudio\Database\Repositories\EloquentRepository;

class CountryRepository extends EloquentRepository
{
    public function __construct(Country $model)
    {
        parent::__construct($model);
    }

    public function findByName($value)
    {
        return $this->findFirstBy('name', $value);
    }

    public function findByTld($value)
    {
        return $this->findFirstBy('tld', $value);
    }

    public function findByCca2($value)
    {
        return $this->findFirstBy('cca2', $value);
    }

    public function findByCcn3($value)
    {
        return $this->findFirstBy('ccn3', $value);
    }

    public function findByCca3($value)
    {
        return $this->findFirstBy('cca3', $value);
    }

    public function findByCioc($value)
    {
        return $this->findFirstBy('cioc', $value);
    }

    public function findByCurrency($value)
    {
        return $this->findFirstBy('currency', $value);
    }

    public function findByCallingCode($value)
    {
        return $this->findFirstBy('callingcode', $value);
    }

    public function findByCapital($value)
    {
        return $this->findFirstBy('capital', $value);
    }

    public function findByAltSpellings($value)
    {
        return $this->findFirstBy('altspellings', $value);
    }

    public function findByRegion($value)
    {
        return $this->findFirstBy('region', $value);
    }

    public function findBySubregion($value)
    {
        return $this->findFirstBy('subregion', $value);
    }

    public function findByLanguages($value)
    {
        return $this->findFirstBy('languages', $value);
    }

    public function findByTranslations($value)
    {
        return $this->findFirstBy('translations', $value);
    }

    public function findByLatlng($value)
    {
        return $this->findFirstBy('latlng', $value);
    }

    public function findByDemonym($value)
    {
        return $this->findFirstBy('demonym', $value);
    }

    public function findByLandlocked($value)
    {
        return $this->findFirstBy('landlocked', $value);
    }

    public function findByBorders($value)
    {
        return $this->findFirstBy('borders', $value);
    }

    public function findByArea($value)
    {
        return $this->findFirstBy('area', $value);
    }

    public function findManyByName($value)
    {
        return $this->findManyBy('name', $value);
    }

    public function findManyByTld($vaManylue)
    {
        return $this->findManyBy('tld', $value);
    }

    public function findManyByCca2($value)
    {
        return $this->findManyBy('cca2', $value);
    }

    public function findManyByCcn3($value)
    {
        return $this->findManyBy('ccn3', $value);
    }

    public function findManyByCca3($value)
    {
        return $this->findManyBy('cca3', $value);
    }

    public function findManyByCurrency($value)
    {
        return $this->findManyBy('currency', $value);
    }

    public function findManyByCallingCode($value)
    {
        return $this->findManyBy('callingcode', $value);
    }

    public function findManyByCapital($value)
    {
        return $this->findManyBy('capital', $value);
    }

    public function findManyByAltSpellings($value)
    {
        return $this->findManyBy('altspellings', $value);
    }

    public function findManyByRegion($value)
    {
        return $this->findManyBy('region', $value);
    }

    public function findManyBySubregion($value)
    {
        return $this->findManyBy('subregion', $value);
    }

    public function findManyByLanguages($value)
    {
        return $this->findManyBy('languages', $value);
    }

    public function findManyByTranslations($value)
    {
        return $this->findManyBy('translations', $value);
    }

    public function findManyByLatlng($value)
    {
        return $this->findManyBy('latlng', $value);
    }

    public function findManyByDemonym($value)
    {
        return $this->findManyBy('demonym', $value);
    }

    public function findManyByLandlocked($value)
    {
        return $this->findManyBy('landlocked', $value);
    }

    public function findManyByBorders($value)
    {
        return $this->findManyBy('borders', $value);
    }

    public function findManyByArea($value)
    {
        return $this->findManyBy('area', $value);
    }
}
