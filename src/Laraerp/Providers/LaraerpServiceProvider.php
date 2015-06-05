<?php

namespace Laraerp\Providers;

use Illuminate\Contracts\View\View;
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
         * View Composers
         */
        $this->app['view']->composers([
            'Laraerp\Http\ViewComposers\TagsComposer' => ['cliente.index']
        ]);

        /*
         * Binding Repositories
         */
        $this->app->bind('Laraerp\Contracts\Repositories\PessoaRepository', 'Laraerp\Repositories\Eloquent\PessoaEloquentRepository');
        $this->app->bind('Laraerp\Contracts\Repositories\EnderecoRepository', 'Laraerp\Repositories\Eloquent\EnderecoEloquentRepository');
        $this->app->bind('Laraerp\Contracts\Repositories\CidadeRepository', 'Laraerp\Repositories\Eloquent\CidadeEloquentRepository');
        $this->app->bind('Laraerp\Contracts\Repositories\ContatoRepository', 'Laraerp\Repositories\Eloquent\ContatoEloquentRepository');
        $this->app->bind('Laraerp\Contracts\Repositories\ClienteRepository', 'Laraerp\Repositories\Eloquent\ClienteEloquentRepository');
        $this->app->bind('Laraerp\Contracts\Repositories\ProdutoRepository', 'Laraerp\Repositories\Eloquent\ProdutoEloquentRepository');
        $this->app->bind('Laraerp\Contracts\Repositories\UnidadeRepository', 'Laraerp\Repositories\Eloquent\UnidadeEloquentRepository');
        $this->app->bind('Laraerp\Contracts\Repositories\VendaRepository', 'Laraerp\Repositories\Eloquent\VendaEloquentRepository');
        $this->app->bind('Laraerp\Contracts\Repositories\VendaItemRepository', 'Laraerp\Repositories\Eloquent\VendaItemEloquentRepository');

        /*
         * Binding Models
         */
        $this->app->bind('Laraerp\Contracts\Models\PessoaModel', 'Laraerp\Models\Eloquent\PessoaEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\EnderecoModel', 'Laraerp\Models\Eloquent\EnderecoEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\CidadeModel', 'Laraerp\Models\Eloquent\CidadeEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\ContatoModel', 'Laraerp\Models\Eloquent\ContatoEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\ClienteModel', 'Laraerp\Models\Eloquent\ClienteEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\ProdutoModel', 'Laraerp\Models\Eloquent\ProdutoEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\UnidadeModel', 'Laraerp\Models\Eloquent\UnidadeEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\VendaModel', 'Laraerp\Models\Eloquent\VendaEloquentModel');
        $this->app->bind('Laraerp\Contracts\Models\VendaItemModel', 'Laraerp\Models\Eloquent\VendaItemEloquentModel');

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
