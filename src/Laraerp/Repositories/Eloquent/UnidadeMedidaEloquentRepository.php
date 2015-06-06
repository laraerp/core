<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Models\UnidadeMedidaModel;
use Laraerp\Contracts\Repositories\UnidadeMedidaRepository;

class UnidadeMedidaEloquentRepository implements UnidadeMedidaRepository{

    function __construct(UnidadeMedidaModel $unidadeMedidaModel)
    {
        $this->unidadeMedida = $unidadeMedidaModel;
    }

    /**
     * Retorna uma Unidade de Medida
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function getById($id)
    {
        return $this->unidadeMedida->find($id);
    }
}