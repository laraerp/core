<?php namespace Laraerp\Contracts\Models;

interface VendaModel {

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setId($id);

    /**
     * Set Cliente
     *
     * @param \Laraerp\Contracts\Models\ClienteModel $cliente
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setCliente(ClienteModel $cliente);

    /**
     * Set Endereço de Entrega
     *
     * @param \Laraerp\Contracts\Models\EnderecoModel $endereco
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setEnderecoEntrega(EnderecoModel $endereco);

    /**
     * Set Valor Frete
     *
     * @param int $valor_frete
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setValorFrete($valor_frete);

    /**
     * Set Valor Total
     *
     * @param int $valor_total
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setValorTotal($valor_total);

    /**
     * Get identification
     *
     * @return int
     */
    public function getId();

    /**
     * Get Pessoa
     *
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function getCliente();

    /**
     * Get Endereço de Entrega
     *
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function getEnderecoEntrega();

    /**
     * Get Valor Frete
     *
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getValorFrete();

    /**
     * Get Valor Total
     *
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getValorTotal();

    /**
     * Get Vendas Item
     *
     * @return \Illuminate\Support\Collection
     */
    public function getVendasItens();

}