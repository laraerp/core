<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Criteria;
use Laraerp\Contracts\Models\ClienteModel;
use Laraerp\Contracts\Repositories\ClienteRepository;
use Laraerp\Contracts\Repositories\PessoaRepository;

class ClienteEloquentRepository implements ClienteRepository{

    /**
     * Constructor
     *
     * @param ClienteModel $cliente
     */
    function __construct(ClienteModel $cliente, PessoaRepository $pessoaRepository)
    {
        $this->cliente = $cliente;
        $this->pessoaRepository = $pessoaRepository;
    }


    /**
     * Aplica um filtro para retornar apenas clientes
     * que possui Nome, Razão Social ou Documento com
     * a string $like
     *
     * @param null $like
     * @return \Laraerp\Contracts\Repositories\ClienteRepository
     */
    public function whereLike($like = null)
    {
        if(!is_null($like)){

            $this->cliente = $this->cliente->where(function($q) use ($like) {

                $q->whereHas('pessoa', function ($query) use ($like) {

                    $query->where(function($query) use ($like){
                        $query->where('nome', 'like', '%' . $like . '%');
                        $query->orWhere('razao_apelido', 'like', '%' . $like . '%');
                        $query->orWhere('documento', 'like', '%' . $like . '%');
                    });
                });

            });
        }

        return $this;
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
        return $this->cliente->get();
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
        return $this->cliente->select('clientes.*')->paginate($limit, $columns);
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
        if(!is_null($by))
            $this->cliente = $this->cliente->orderBy($by, $order);

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
        return $this->cliente->find($id);
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
            $this->cliente = $this->cliente->find($params['id']);

        /*
         * Verificando se foi informado pessoa_id para vincular ao cliente.
         * Caso contrário, insere uma pessoa.
         */
        if(isset($params['pessoa_id']))
            $this->cliente->setPessoa($this->pessoaRepository->getById($params['pessoa_id']));
        else
            $this->cliente->setPessoa($this->pessoaRepository->save($params));


        if(isset($params['inscricao_estatual']))
            $this->cliente->setInscricaoEstadual($params['inscricao_estadual']);

        if(isset($params['inscricao_municipal']))
            $this->cliente->setInscricaoMunicipal($params['inscricao_municipal']);

        if(isset($params['retem_issqn']))
            $this->cliente->setRetemIssqn($params['retem_issqn']);

        /*
         * Salvando
         */
        $this->cliente->save();

        return $this->cliente;
    }
}