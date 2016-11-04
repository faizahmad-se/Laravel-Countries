<?php

namespace BrianFaust\Tests\Countries;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use BrianFaust\Countries\Console\SeedCountries;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testSeedCountriesCommandInjectable()
    {
        $this->assertIsInjectable(SeedCountries::class);
    }
}
