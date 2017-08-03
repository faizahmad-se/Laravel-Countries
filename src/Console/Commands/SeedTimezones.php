<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Countries.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Countries\Console\Commands;

use DateTime;
use DateTimeZone;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

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
    private function offsetGmt(string $timezone): string
    {
        $offset = $this->offsetSeconds($timezone);
        $offset = gmdate('H:i', (int) $offset);

        return 'GMT'.($offset < 0 ? $offset : '+'.$offset);
    }

    /**
     * [offsetHours description].
     *
     * @param string $timezone
     *
     * @return int
     */
    private function offsetHours(string $timezone): float
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
    private function offsetSeconds(string $timezone): float
    {
        $dtz = new DateTimeZone($timezone);

        return $dtz->getOffset(new DateTime('now', $dtz));
    }

    /**
     * @return \Illuminate\Databse\Eloquent\Model
     */
    private function getModel(): Model
    {
        $model = config('countries.models.country');

        return new $model();
    }
}
