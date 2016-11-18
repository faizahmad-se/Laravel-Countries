<?php

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Countries\Console;

use Illuminate\Console\Command;
use Illuminate\Databse\Eloquent\Model;
use DateTime;
use DateTimeZone;

class SeedTimezones extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:timezones';

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
            $timezones = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, $country->cca2);

            foreach ($timezones as $timezone) {
                $country->timezones()->create([
                    'name'           => $timezone,
                    'offset_gmt'     => $this->offsetGmt($timezone),
                    'offset_hours'   => $this->offsetHours($timezone),
                    'offset_seconds' => $this->offsetSeconds($timezone),
                ]);
            }
        }

        $this->getOutput()->writeln('<info>Seeded:</info> Countries > Timezones');
    }

    /**
     * [offsetGmt description].
     *
     * @param string $timezone
     *
     * @return string
     */
    private function offsetGmt(string $timezone) : string
    {
        $offset = $this->offsetSeconds($timezone);
        $offset = gmdate('H:i', $offset);

        return 'GMT'.($offset < 0 ? $offset : '+'.$offset);
    }

    /**
     * [offsetHours description].
     *
     * @param string $timezone
     *
     * @return int
     */
    private function offsetHours(string $timezone) : int
    {
        return $this->offsetSeconds($timezone) / 3600;
    }

    /**
     * [offsetSeconds description].
     *
     * @param string $timezone
     *
     * @return int
     */
    private function offsetSeconds(string $timezone) : int
    {
        $dtz = new DateTimeZone($timezone);

        return $dtz->getOffset(new DateTime('now', $dtz));
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