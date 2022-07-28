<?php

namespace Smartisan\QueryFilter;

use Illuminate\Support\ServiceProvider;
use Smartisan\QueryFilter\Commands\MakeFilterCommand;

class QueryFilterServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/query-filter.php', 'query-filter');
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeFilterCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../config/query-filter.php' => config_path('query-filter.php'),
            ], 'config');
        }
    }
}
