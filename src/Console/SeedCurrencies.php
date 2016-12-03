<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BrianFaust\Countries\Console;

use Illuminate\Console\Command;
use NumberFormatter;

class SeedCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:currencies';

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
        foreach ($this->getModel()->all() as $country) {
            if (head($country->currency)) {
                $code = head($country->currency);

                $country->currencies()->create([
                    'code'   => $code,
                    'symbol' => $this->getCurrencySymbol($code, $country->cca2),
                ]);
            }
        }

        $this->getOutput()->writeln('<info>Seeded:</info> Countries > Currencies');
    }

    /**
     * Get the symbol value for the given locale.
     *
     * @param string $currencyCode
     * @param string $locale
     *
     * @return string
     */
    private function getCurrencySymbol(string $currencyCode, string $locale): string
    {
        $formatter = new NumberFormatter($locale.'@currency='.$currencyCode, NumberFormatter::CURRENCY);

        return $formatter->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
    }

    /**
     * @return \Illuminate\Databse\Eloquent\Model
     */
    private function getModel()
    {
        $model = config('countries.models.country');

        return new $model();
    }
}
