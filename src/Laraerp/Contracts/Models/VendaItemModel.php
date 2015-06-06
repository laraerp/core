<?php namespace Laraerp\Contracts\Models;

interface VendaItemModel {

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setId($id);

    /**
     * Set Venda
     *
     * @param \Laraerp\Contracts\Models\VendaModel $venda
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setVenda(VendaModel $venda);

    /**
     * Set Produto
     *
     * @param \Laraerp\Contracts\Models\ProdutoModel $produto
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setProduto(ProdutoModel $produto);

    /**
     * Set Unidade de Medida
     *
     * @param \Laraerp\Contracts\Models\UnidadeMedidaModel $unidadeMedida
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setUnidadeMedida(UnidadeMedidaModel $unidadeMedida);

    /**
     * Set Código
     *
     * @param string $codigo
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setCodigo($codigo);

    /**
     * Set Descrição
     *
     * @param string $descricao
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setDescricao($descricao);

    /**
     * Set Quantidade
     *
     * @param int $quantidade
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setQuantidade($quantidade);

    /**
     * Set Valor Unitário
     *
     * @param mixed $valorUnitario
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setValorUnitario($valorUnitario);

    /**
     * Set Valor Desconto
     *
     * @param mixed $valorDesconto
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setValorDesconto($valorDesconto);

    /**
     * Set Valor Acrescimo
     *
     * @param mixed $valorAcrescimo
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setValorAcrescimo($valorAcrescimo);

    /**
     * Set Valor Total
     *
     * @param mixed $valorTotal
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setValorTotal($valorTotal);

    /**
     * Get identification
     *
     * @return int
     */
    public function getId();

    /**
     * Get Venda
     *
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getVenda();

    /**
     * Get Produto
     *
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function getProduto();

    /**
     * Get Unidade de Medida
     *
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function getUnidadeMedida();

    /**
     * Get Código
     *
     * @return string
     */
    public function getCodigo();

    /**
     * Get Descrição
     *
     * @return string
     */
    public function getDescricao();

    /**
     * Get Quantidade
     *
     * @return mixed
     */
    public function getQuantidade();

    /**
     * Get Valor Unitário
     *
     * @param boolean $withFormat
     * @return string
     */
    public function getValorUnitario($withFormat = true);

    /**
     * Get Valor Desconto
     *
     * @param boolean $withFormat
     * @return string
     */
    public function getValorDesconto($withFormat = true);

    /**
     * Get Valor Acrescimo
     *
     * @param boolean $withFormat
     * @return string
     */
    public function getValorAcrescimo($withFormat = true);

    /**
     * Get Valor Total
     *
     * @param boolean $withFormat
     * @return string
     */
    public function getValorTotal($withFormat = true);

}