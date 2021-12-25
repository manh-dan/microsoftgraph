<?php

namespace Manhdan\Microsoftgraph;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->publishResources();
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/microsoftgraph.php', 'microsoftgraph');
    }

    protected function publishResources()
    {
        $this->publishes([
            __DIR__ . '/../config/microsoftgraph.php' => config_path('microsoftgraph.php'),
        ], 'microsoftgraph-config');
    }
}
