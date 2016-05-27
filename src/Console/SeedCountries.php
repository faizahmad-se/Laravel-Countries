<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Countries\Console;

use DB;
use DraperStudio\Countries\Models\Country;
use Illuminate\Console\Command;

/**
 * Class SeedCountries.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class SeedCountries extends Command
{
    /**
     * @var string
     */
    protected $signature = 'countries:seed';

    /**
     * @var string
     */
    protected $description = 'Command description.';

    public function fire()
    {
        DB::table('countries')->delete();

        $data = base_path('vendor/mledoze/countries/dist/countries.json');
        $data = json_decode(file_get_contents($data), true);

        foreach ($data as $country) {
            Country::create($country);
        }

        $this->getOutput()->writeln('<info>Seeded:</info> Countries');
    }
}
