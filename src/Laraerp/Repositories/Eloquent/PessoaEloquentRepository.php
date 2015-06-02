<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Models\PessoaModel;
use Laraerp\Contracts\Repositories\PessoaRepository;

class PessoaEloquentRepository implements PessoaRepository{

    function __construct(PessoaModel $pessoaModel)
    {
        $this->pessoa = $pessoaModel;
    }


    /**
     * Retrieve all data of repository
     *
     * @param array $columns
     * @param null $limit
     * @param null $offset
     * @return \Illuminate\Support\Collection
     */
    public function all(array $columns = array('*'), $limit = null, $offset = null)
    {
        // TODO: Implement all() method.
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
        // TODO: Implement paginate() method.
    }

    /**
     * Remover uma Pessoa do repositório
     *
     * @param \Laraerp\Contracts\Models\PessoaModel $pessoa
     * @return boolean
     */
    public function remove(PessoaModel $pessoa)
    {
        // TODO: Implement remove() method.
    }

    /**
     * Pesquisa no repositorio uma pessoa com o documento informado.
     *
     * @param string $documento
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function getByDocumento($documento)
    {
        // TODO: Implement getByDocumento() method.
    }

    /**
     * Save data in repository
     *
     * @param array $params
     * @return \Laraerp\Contracts\Model
     */
    public function save(array $params)
    {
        if(isset($params['id']) && $params['id']>0)
            $this->pessoa = $this->pessoa->find($params['id']);

        $this->pessoa->setDocumento($params['documento']);
        $this->pessoa->setNome($params['nome']);

        if(isset($params['razao_apelido']))
            $this->pessoa->setRazaoApelido($params['razao_apelido']);

        if(isset($params['nascimento_fundacao']))
            $this->pessoa->setNascimentoFundacao($params['nascimento_fundacao']);

        /*
         * Save
         */
        $this->pessoa->save();

        return $this->pessoa;
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
        // TODO: Implement retrieve() method.
    }

    /**
     * Remove a entity in repository
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repository
     */
    public function order($by = null, $order = null)
    {
        // TODO: Implement order() method.
    }

    /**
     * Returns a specific model by identifier
     *
     * @param int $id
     * @return \Laraerp\Contracts\Model
     */
    public function getById($id)
    {
        // TODO: Implement getById() method.
    }
}