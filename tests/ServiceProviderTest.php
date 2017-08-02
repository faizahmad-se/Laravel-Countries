<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Tests\Countries;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use BrianFaust\Countries\Console\Commands\SeedCountries;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testSeedCountriesCommandInjectable()
    {
        $this->assertIsInjectable(SeedCountries::class);
    }
}
