<?php namespace Laraerp\Contracts\Repositories;


interface UnidadeRepository{

    /**
     * Retorna uma Unidade
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\UnidadeModel
     */
    public function getById($id);

    /**
     * Aplica ordenação
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repositories\UnidadeRepository
     */
    public function order($by = null, $order = null);


    /**
     * Retorna registros do repositório
     *
     * @return \Illuminate\Support\Collection
     */
    public function all();
}