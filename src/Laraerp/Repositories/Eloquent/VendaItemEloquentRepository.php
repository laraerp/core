<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Criteria;
use Laraerp\Contracts\Models\VendaItemModel;
use Laraerp\Contracts\Repositories\ProdutoRepository;
use Laraerp\Contracts\Repositories\UnidadeMedidaRepository;
use Laraerp\Contracts\Repositories\VendaItemRepository;
use Laraerp\Contracts\Repositories\VendaRepository;

class VendaItemEloquentRepository implements VendaItemRepository{

    /**
     * Constructor
     *
     * @param VendaItemModel $vendaItemModel
     */
    function __construct(VendaItemModel $vendaItemModel, VendaRepository $vendaRepository, UnidadeMedidaRepository $unidadeMedidaRepository, ProdutoRepository $produtoRepository)
    {
        $this->vendaItem = $vendaItemModel;
        $this->vendaRepository = $vendaRepository;
        $this->unidadeMedidaRepository = $unidadeMedidaRepository;
        $this->produtoRepository = $produtoRepository;
    }


    /**
     * Salva um Item de Venda no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function save(array $params)
    {
        if(isset($params['id']) && $params['id']>0)
            $this->vendaItem = $this->getById($params['id']);

        $this->vendaItem->setVenda($this->vendaRepository->getById($params['venda_id']));
        $this->vendaItem->setProduto($this->produtoRepository->getById($params['produto_id']));
        $this->vendaItem->setUnidadeMedida($this->unidadeMedidaRepository->getById($params['unidade_medida_id']));

        $this->vendaItem->setCodigo($params['codigo']);
        $this->vendaItem->setDescricao($params['descricao']);
        $this->vendaItem->setQuantidade($params['quantidade']);
        $this->vendaItem->setValorUnitario($params['valor_unitario']);
        $this->vendaItem->setValorDesconto($params['valor_desconto']);
        $this->vendaItem->setValorAcrescimo($params['valor_acrescimo']);

        $bruto = $this->vendaItem->getQuantidade() * $this->vendaItem->getValorUnitario(false);

        $total = $bruto + $this->vendaItem->getValorAcrescimo(false) - $this->vendaItem->getValorDesconto(false);

        $this->vendaItem->setValorTotal($total);

        /*
         * Salvando
         */
        $this->vendaItem->save();

        /*
         * Atualizando valor total da venda
         */
        $this->vendaRepository->save(['id' => $params['venda_id']]);

        return $this->vendaItem;
    }

    /**
     * Remove um Item de Venda do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id)
    {
        $venda = $this->getById($id);

        if($venda->delete()){
            /*
             * Atualizando valor total da venda
             */
            $this->vendaRepository->save(['id' => $venda->getVenda()->getId()]);
        }else
            return false;
    }

    /**
     * Retorna um Item de Venda
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function getById($id)
    {
        return $this->vendaItem->find($id);
    }
}