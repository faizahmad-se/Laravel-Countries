<?php



declare(strict_types=1);



namespace BrianFaust\Countries;

use BrianFaust\ServiceProvider\AbstractServiceProvider;

class CountriesServiceProvider extends AbstractServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        parent::boot();

        $this->publishMigrations();

        $this->publishConfig();

        new Macros($this->app);
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        parent::register();

        $this->mergeConfig();

        $this->commands([
            Console\SeedCountries::class,
            Console\SeedCurrencies::class,
            Console\SeedTimezones::class,
            Console\SeedTaxRates::class,
        ]);
    }

    /**
     * Get the default package name.
     *
     * @return string
     */
    public function getPackageName(): string
    {
        return 'countries';
    }
}
