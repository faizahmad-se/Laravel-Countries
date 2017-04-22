<?php



declare(strict_types=1);



namespace BrianFaust\Tests\Countries;

use BrianFaust\Countries\Console\SeedCountries;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testSeedCountriesCommandInjectable()
    {
        $this->assertIsInjectable(SeedCountries::class);
    }
}
