<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Tests\Countries;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use DraperStudio\Countries\Console\SeedCountries;

/**
 * This is the service provider test class.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testSeedCountriesCommandInjectable()
    {
        $this->assertIsInjectable(SeedCountries::class);
    }
}
