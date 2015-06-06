<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Criteria;
use Laraerp\Contracts\Models\ClienteModel;
use Laraerp\Contracts\Models\VendaModel;
use Laraerp\Contracts\Repositories\ClienteRepository;
use Laraerp\Contracts\Repositories\EnderecoRepository;
use Laraerp\Contracts\Repositories\VendaRepository;

class VendaEloquentRepository implements VendaRepository{

    /**
     * Constructor
     *
     * @param ClienteModel $cliente
     */
    function __construct(VendaModel $venda, ClienteRepository $clienteRepository, EnderecoRepository $enderecoRepository)
    {
        $this->venda = $venda;
        $this->clienteRepository = $clienteRepository;
        $this->enderecoRepository = $enderecoRepository;
    }


    /**
     * Aplica condição $like para pesquisar uma venda relacionada a um Cliente
     *
     * @param null $like
     * @return \Laraerp\Contracts\Repositories\VendaRepository
     */
    public function whereLike($like = null)
    {
        if(!is_null($like)){

            $this->venda = $this->venda->where(function($q) use ($like) {

                $q->whereHas('cliente', function ($q) use ($like) {

                    $q->whereHas('pessoa', function ($query) use ($like) {

                        $query->where(function ($query) use ($like) {
                            $query->where('nome', 'like', '%' . $like . '%');
                            $query->orWhere('razao_apelido', 'like', '%' . $like . '%');
                            $query->orWhere('documento', 'like', '%' . $like . '%');
                        });
                    });
                });

            });
        }

        return $this;
    }


    /**
     * Retorna uma coleção de Vendas com paginação
     *
     * @param null $limit
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = null, array $columns = array('*'))
    {
        return $this->venda->select('vendas.*')->paginate($limit, $columns);
    }

    /**
     * Aplica ordenação
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repositories\VendaRepository
     */
    public function order($by = null, $order = null)
    {
        if(!is_null($by))
            $this->venda = $this->venda->orderBy($by, $order);

        return $this;
    }

    /**
     * Retorna uma Venda
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getById($id)
    {
        return $this->venda->find($id);
    }

    /**
     * Salva uma Venda no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function save(array $params)
    {
        if(isset($params['id']) && $params['id']>0)
            $this->venda = $this->getById($params['id']);

        if(isset($params['cliente_id']))
            $this->venda->setCliente($this->clienteRepository->getById($params['cliente_id']));

        if(isset($params['endereco_id']))
            $this->venda->setEnderecoEntrega($this->enderecoRepository->getById($params['endereco_entrega_id']));

        if(isset($params['valor_frete']))
            $this->venda->setValorFrete($params['valor_frete']);

        /*
         * Calculando total
         */
        $total = 0;

        foreach($this->venda->getVendasItens() as $item)
            $total += $item->getValorTotal(false);

        $total += $this->venda->getValorFrete(false);

        $this->venda->setValorTotal($total);

        /*
         * Salvando
         */
        $this->venda->save();

        return $this->venda;
    }

    /**
     * Remove Venda do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id)
    {
        return $this->getById($id)->delete();
    }
}