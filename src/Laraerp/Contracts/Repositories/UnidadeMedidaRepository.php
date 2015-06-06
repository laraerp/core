<?php namespace Laraerp\Contracts\Repositories;


interface UnidadeMedidaRepository{

    /**
     * Retorna uma Unidade de Medida
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function getById($id);

}