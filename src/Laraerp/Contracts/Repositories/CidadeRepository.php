<?php namespace Laraerp\Contracts\Repositories;


interface CidadeRepository{

    /**
     * Retorna uma cidade
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\CidadeModel
     */
    public function getById($id);
}