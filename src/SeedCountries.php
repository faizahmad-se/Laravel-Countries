<?php

namespace BrianFaust\Countries;

use DB;
use Illuminate\Console\Command;

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
