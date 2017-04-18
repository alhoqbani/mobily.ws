<?php

namespace Alhoqbani\MobilyWs;

use Illuminate\Support\ServiceProvider;


class MobilyWsServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('SMS', 'Alhoqbani\MobilyWs\SMS');
    
        $config = __DIR__ . '/../config/SMS.php';
        $this->mergeConfigFrom($config, 'SMS');

        $this->publishes([__DIR__ . '/../config/SMS.php' => config_path('SMS.php')], 'config');

    }
}
