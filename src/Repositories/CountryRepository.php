<?php

namespace BrianFaust\Countries\Repositories;

use BrianFaust\Countries\Models\Country;
use BrianFaust\Eloquent\Repositories\AbstractRepository;

class CountryRepository extends AbstractRepository
{
    public function getModelClass()
    {
        return Country::class;
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByName($value)
    {
        return $this->findFirstBy('name', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByTld($value)
    {
        return $this->findFirstBy('tld', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByCca2($value)
    {
        return $this->findFirstBy('cca2', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByCcn3($value)
    {
        return $this->findFirstBy('ccn3', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByCca3($value)
    {
        return $this->findFirstBy('cca3', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByCioc($value)
    {
        return $this->findFirstBy('cioc', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByCurrency($value)
    {
        return $this->findFirstBy('currency', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByCallingCode($value)
    {
        return $this->findFirstBy('callingcode', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByCapital($value)
    {
        return $this->findFirstBy('capital', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByAltSpellings($value)
    {
        return $this->findFirstBy('altspellings', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByRegion($value)
    {
        return $this->findFirstBy('region', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findBySubregion($value)
    {
        return $this->findFirstBy('subregion', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByLanguages($value)
    {
        return $this->findFirstBy('languages', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByTranslations($value)
    {
        return $this->findFirstBy('translations', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByLatlng($value)
    {
        return $this->findFirstBy('latlng', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByDemonym($value)
    {
        return $this->findFirstBy('demonym', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByLandlocked($value)
    {
        return $this->findFirstBy('landlocked', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByBorders($value)
    {
        return $this->findFirstBy('borders', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findByArea($value)
    {
        return $this->findFirstBy('area', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByName($value)
    {
        return $this->findManyBy('name', $value);
    }

    /**
     * @param $vaManylue
     *
     * @return mixed
     */
    public function findManyByTld($vaManylue)
    {
        return $this->findManyBy('tld', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByCca2($value)
    {
        return $this->findManyBy('cca2', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByCcn3($value)
    {
        return $this->findManyBy('ccn3', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByCca3($value)
    {
        return $this->findManyBy('cca3', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByCurrency($value)
    {
        return $this->findManyBy('currency', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByCallingCode($value)
    {
        return $this->findManyBy('callingcode', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByCapital($value)
    {
        return $this->findManyBy('capital', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByAltSpellings($value)
    {
        return $this->findManyBy('altspellings', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByRegion($value)
    {
        return $this->findManyBy('region', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyBySubregion($value)
    {
        return $this->findManyBy('subregion', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByLanguages($value)
    {
        return $this->findManyBy('languages', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByTranslations($value)
    {
        return $this->findManyBy('translations', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByLatlng($value)
    {
        return $this->findManyBy('latlng', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByDemonym($value)
    {
        return $this->findManyBy('demonym', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByLandlocked($value)
    {
        return $this->findManyBy('landlocked', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByBorders($value)
    {
        return $this->findManyBy('borders', $value);
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findManyByArea($value)
    {
        return $this->findManyBy('area', $value);
    }
}
