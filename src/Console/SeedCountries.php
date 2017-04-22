<?php



declare(strict_types=1);



namespace BrianFaust\Countries\Console;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class SeedCountries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:countries';

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
    public function handle(): void
    {
        $model = $this->getModel();

        $data = base_path('vendor/mledoze/countries/dist/countries.json');
        $data = json_decode(file_get_contents($data), true);

        foreach ($data as $country) {
            $model->create($country);
        }

        $this->getOutput()->writeln('<info>Seeded:</info> Countries');
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
