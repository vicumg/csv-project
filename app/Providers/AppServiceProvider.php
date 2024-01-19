<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Console\Commands\DataGenerator::class,
            \App\Module\Csv\CsvCreator::class
        );
          $this->app->bind(
            \App\Module\Csv\DataCreator::class,
            \App\Module\Csv\StringCreator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
