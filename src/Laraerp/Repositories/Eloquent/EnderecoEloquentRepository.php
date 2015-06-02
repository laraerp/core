<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Models\EnderecoModel;
use Laraerp\Contracts\Repositories\CidadeRepository;
use Laraerp\Contracts\Repositories\EnderecoRepository;
use Laraerp\Contracts\Repositories\PessoaRepository;

class EnderecoEloquentRepository implements EnderecoRepository{

    /**
     * Constructor
     *
     * @param \Laraerp\Contracts\Models\EnderecoModel $enderecoModel
     * @param \Laraerp\Contracts\Repositories\PessoaRepository $pessoaRepository
     * @param \Laraerp\Contracts\Repositories\CidadeRepository $cidadeRepository
     */
    function __construct(EnderecoModel $enderecoModel, PessoaRepository $pessoaRepository, CidadeRepository $cidadeRepository)
    {
        $this->endereco = $enderecoModel;
        $this->pessoaRepository = $pessoaRepository;
        $this->cidadeRepository = $cidadeRepository;
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
        return $this->endereco->get();
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
        return $this->endereco->paginate($limit, $columns);
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
            $this->endereco = $this->endereco->orderBy($by, $order);

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
        return $this->endereco->find($id);
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
            $this->endereco = $this->endereco->find($params['id']);

        if(isset($params['complemento']))
            $this->endereco->setComplemento($params['complemento']);

        if(isset($params['pessoa_id']))
            $this->endereco->setPessoa($this->pessoaRepository->getById($params['pessoa_id']));

        $this->endereco->setCep($params['cep']);
        $this->endereco->setLogradouro($params['logradouro']);
        $this->endereco->setNumero($params['numero']);
        $this->endereco->setBairro($params['bairro']);
        $this->endereco->setCidade($this->pessoaRepository->getById($params['cidade_id']));

        /*
         * Salvando
         */
        $this->endereco->save();

        return $this->endereco;
    }
}