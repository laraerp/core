<?php namespace Laraerp\Contracts\Repositories;


interface UnidadeMedidaRepository{

    /**
     * Retorna uma Unidade de Medida
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function getById($id);

    /**
     * Aplica ordenação
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repositories\UnidadeMedidaModel
     */
    public function order($by = null, $order = null);


    /**
     * Retorna registros do repositório
     *
     * @return \Illuminate\Support\Collection
     */
    public function all();
}