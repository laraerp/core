<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Criteria;
use Laraerp\Contracts\Models\ClienteModel;
use Laraerp\Contracts\Repositories\ClienteRepository;
use Laraerp\Contracts\Repositories\PessoaRepository;
use Laraerp\Ordination\OrdinationTrait;

class ClienteEloquentRepository implements ClienteRepository{

    use OrdinationTrait;

    /**
     * Constructor
     *
     * @param ClienteModel $cliente
     */
    function __construct(ClienteModel $cliente,PessoaRepository $pessoaRepository)
    {
        $this->cliente = $cliente;
        $this->pessoaRepository = $pessoaRepository;
    }


    /**
     * Aplica condição $like nos campos Nome, Razão Social e Documento
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
     * Retorna uma coleção de Clientes com paginação
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
     * Aplica ordenação
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repositories\ClienteRepository
     */
    public function order($by = null, $order = null)
    {
        if(!is_null($by))
            $this->cliente = $this->cliente->orderBy($by, $order);

        return $this;
    }

    /**
     * Retorna um Cliente
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function getById($id)
    {
        return $this->cliente->find($id);
    }

    /**
     * Salva um Cliente no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function save(array $params)
    {
        if(isset($params['id']) && $params['id']>0) {
            $this->cliente = $this->cliente->find($params['id']);
            unset($params['id']);
        }

        /*
         * Verificando se existe uma Pessoa com o "pessoa_id" ou "documento" informado
         */
        $pessoa = null;

        if(isset($params['pessoa_id']))
            $pessoa = $this->pessoaRepository->getById($params['pessoa_id']);
        else if(isset($params['documento']))
            $pessoa = $this->pessoaRepository->getByDocumento($params['documento']);


        /*
         * Verificando se encontrou a pessoa..
         * Se não encontrar, tenta criar uma
         */
        if(!is_null($pessoa)){

            //Salvando dados
            $params['id'] = $pessoa->getId();
            $this->pessoaRepository->save($params);

            $cliente = $pessoa->getCliente();

            /*
             * Verificando se a pessoa ja é um cliente
             */
            if(!is_null($cliente))
                $this->cliente = $cliente;
            else
                $this->cliente->setPessoa($pessoa);
        }else
            $this->cliente->setPessoa($this->pessoaRepository->save($params));


        if(isset($params['inscricao_estadual']))
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

    /**
     * Remove Cliente do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id)
    {
        return $this->getById($id)->delete();
    }
}