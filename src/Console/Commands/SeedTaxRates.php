<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Countries\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class SeedTaxRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:taxrates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = base_path('vendor/faustbrian/laravel-countries/data/taxrates.json');
        $data = json_decode(file_get_contents($data), true);

        foreach ($this->getModel()->all() as $country) {
            $rate = 0;

            if (array_key_exists($country['name']['common'], $data)) {
                $rate = $data[$country['name']['common']];
            }

            $country->taxrate()->create([
                'rate'       => $rate,
                'percentage' => $rate * 100,
            ]);
        }

        $this->getOutput()->writeln('<info>Seeded:</info> Countries > TaxRates');
    }

    /**
     * @return \Illuminate\Databse\Eloquent\Model
     */
    private function getModel(): Model
    {
        $model = config('laravel-countries.models.country');

        return new $model();
    }
}
