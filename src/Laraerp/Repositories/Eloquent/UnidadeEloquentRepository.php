<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Models\UnidadeModel;
use Laraerp\Contracts\Repositories\UnidadeRepository;

class UnidadeEloquentRepository implements UnidadeRepository{

    function __construct(UnidadeModel $unidadeModel)
    {
        $this->unidade = $unidadeModel;
    }


    /**
     * Retorna uma Unidade
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\UnidadeModel
     */
    public function getById($id)
    {
        return $this->unidade->find($id);
    }

    /**
     * Aplica ordenação
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repositories\UnidadeRepository
     */
    public function order($by = null, $order = null)
    {
        if(!is_null($by))
            $this->unidade = $this->unidade->orderBy($by, $order);

        return $this;
    }

    /**
     * Retorna registros do repositório
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->unidade->get();
    }
}