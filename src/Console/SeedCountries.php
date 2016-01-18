<?php

namespace DraperStudio\Countries\Console;

use DB;
use DraperStudio\Countries\Models\Country;
use Illuminate\Console\Command;

class SeedCountries extends Command
{
    protected $signature = 'countries:seed';

    protected $description = 'Command description.';

    public function fire()
    {
        DB::table('countries')->delete();

        $data = base_path('vendor/mledoze/countries/dist/countries.json');
        $data = json_decode(file_get_contents($data), true);

        foreach ($data as $country) {
            Country::create($country);
        }

        $this->info('Countries seeded!');
    }
}
