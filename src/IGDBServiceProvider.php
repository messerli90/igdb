<?php

namespace Messerli90\IGDB;

use Illuminate\Support\ServiceProvider;
use Messerli90\IGDB\Facades\IGDB;

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
        $loader->alias('IGDB', IGDB::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes(array(__DIR__ . '/../config/igdb.php' => config_path('igdb.php')));

        $this->app->singleton("igdb", function(){
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
