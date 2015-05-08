<?php

namespace Laraerp\Providers;

use Illuminate\Support\ServiceProvider;

class LaraerpServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $back = DIRECTORY_SEPARATOR . '..';
        $database = __DIR__ . $back . $back . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR;

        $this->publishes([
            $database . 'migrations' => base_path('database/migrations'),
            $database . 'seeds' => base_path('database/seeds'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        // Bind any implementations.

        $this->app->register('Laraerp\Providers\CidadesServiceProvider');
        $this->app->register('Laraerp\Providers\CorreiosServiceProvider');
        $this->app->register('Laraerp\Providers\NcmsServiceProvider');
        $this->app->register('Laraerp\Providers\CfopsServiceProvider');

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [];
    }

}
