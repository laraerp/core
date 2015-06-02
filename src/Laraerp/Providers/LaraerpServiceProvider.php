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

        include __DIR__ . '/../Http/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        /*
         * Binding Repositories
         */
        $this->app->bind('Laraerp\Contracts\Repositories\PessoaRepository', 'Laraerp\Repositories\Eloquent\PessoaEloquentRepository');
        $this->app->bind('Laraerp\Contracts\Repositories\ClienteRepository', 'Laraerp\Repositories\Eloquent\ClienteEloquentRepository');

        /*
         * Binding Models
         */
        $this->app->bind('Laraerp\Contracts\Models\PessoaModel', 'Laraerp\Models\Eloquent\PessoaEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\ClienteModel', 'Laraerp\Models\Eloquent\ClienteEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\EnderecoModel', 'Laraerp\Models\Eloquent\EnderecoEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\CidadeModel', 'Laraerp\Models\Eloquent\CidadeEloquentModel');

        /*
         * Artesaos
         */
        $this->app->register('Artesaos\Providers\CidadesServiceProvider');

        /*
         * Laraerp
         */
        $this->app->register('Laraerp\Providers\TagsServiceProvider');
        $this->app->register('Laraerp\Providers\CorreiosServiceProvider');
        $this->app->register('Laraerp\Providers\UnidadesMedidaServiceProvider');

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
