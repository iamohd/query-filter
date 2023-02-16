<?php

namespace Smartisan\QueryFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Smartisan\QueryFilter\Commands\MakeFilterCommand;

class QueryFilterServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     */
    public function register(): void
    {
        Builder::macro('filter', function (string $filter, Request $request = null) {
            if (! $request) {
                $request = request();
            }

            if (class_exists($filter)) {
                return (new $filter($this, $request))->apply();
            }
        });
    }

    /**
     * Bootstrap any package services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeFilterCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../config/query-filter.php' => config_path('query-filter.php'),
            ], 'config');
        }
    }
}
