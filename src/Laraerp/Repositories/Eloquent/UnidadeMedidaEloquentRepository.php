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

    /**
     * Aplica ordenação
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repositories\UnidadeMedidaModel
     */
    public function order($by = null, $order = null)
    {
        if(!is_null($by))
            $this->unidadeMedida = $this->unidadeMedida->orderBy($by, $order);

        return $this;
    }

    /**
     * Retorna registros do repositório
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->unidadeMedida->get();
    }


}