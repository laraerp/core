<?php namespace Laraerp\Repositories\Eloquent;


use Laraerp\Contracts\Models\CidadeModel;
use Laraerp\Contracts\Repositories\CidadeRepository;

class CidadeEloquentRepository implements CidadeRepository{

    function __construct(CidadeModel $cidadeModel)
    {
        $this->cidade = $cidadeModel;
    }

    /**
     * Save data in repository
     *
     * @param array $params
     * @return \Laraerp\Contracts\Model
     */
    public function save(array $params)
    {
        $this->cidade->save($params);

        return $this->cidade;
    }

    /**
     * Retrieve data of repository
     *
     * @param array $columns
     * @param null $limit
     * @param null $offset
     * @return \Illuminate\Support\Collection
     */
    public function retrieve(array $columns = array('*'), $limit = null, $offset = null)
    {
        return $this->cidade->get();
    }

    /**
     * Retrieve all data of repository, paginated
     *
     * @param null $limit
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = null, array $columns = array('*'))
    {
        return $this->cidade->paginate($limit, $columns);
    }

    /**
     * Sets ordination to the list
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repository
     */
    public function order($by = null, $order = null)
    {
        if(!is_null($by))
            $this->cidade = $this->cidade->orderBy($by, $order);

        return $this;
    }

    /**
     * Returns a specific model by identifier
     *
     * @param int $id
     * @return \Laraerp\Contracts\Model
     */
    public function getById($id)
    {
        return $this->cidade->find($id);
    }
}