<?php

namespace Messerli90\IGDB;

use Illuminate\Support\ServiceProvider;

class IGDBServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('IGDB', 'Messerli90\IGDB\Facades\IGDB');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes(array(__DIR__ . '/../../config/igdb.php' => config_path('igdb.php')));

        $this->app->bind("igdb", function(){
            return $this->app->make('Messerli90\IGDB\IGDB', [config('igdb.KEY')]);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('igdb');
    }
}
