<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Models\CidadeModel;
use Laraerp\Contracts\Repositories\CidadeRepository;

class CidadeEloquentRepository implements CidadeRepository{

    function __construct(CidadeModel $cidadeModel)
    {
        $this->cidade = $cidadeModel;
    }

    /**
     * Retorna uma cidade
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\CidadeModel
     */
    public function getById($id)
    {
        return $this->cidade->find($id);
    }
}