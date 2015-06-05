<?php namespace Laraerp\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Laraerp\Contracts\Models\ClienteModel;
use Laraerp\Contracts\Models\EnderecoModel;
use Laraerp\Contracts\Models\VendaModel;
use Laraerp\Ordination\OrdinationTrait;

class VendaEloquentModel extends Model implements VendaModel{

    use OrdinationTrait;

    protected $table = 'vendas';

    /**
     * Belongs to Cliente
     */
    public function cliente() {
        return $this->belongsTo('Laraerp\Models\Eloquent\ClienteEloquentModel', 'cliente_id', 'id');
    }

    /**
     * Belongs to Endereco
     */
    public function enderecoEntrega() {
        return $this->belongsTo('Laraerp\Models\Eloquent\EnderecoEloquentModel', 'endereco_entrega_id', 'id');
    }

    /**
     * HasMany VendaItem
     */
    public function itens() {
        return $this->hasMany('Laraerp\VendaItem');
    }

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set Cliente
     *
     * @param \Laraerp\Contracts\Models\ClienteModel $cliente
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setCliente(ClienteModel $cliente)
    {
        $this->cliente_id = $cliente->getId();

        return $this;
    }

    /**
     * Set Endereço de Entrega
     *
     * @param \Laraerp\Contracts\Models\EnderecoModel $endereco
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setEnderecoEntrega(EnderecoModel $endereco)
    {
        $this->endereco_entrega_id = $endereco->getId();

        return $this;
    }

    /**
     * Set Valor Frete
     *
     * @param int $valor_frete
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setValorFrete($valor_frete)
    {
        $this->valor_frete = $valor_frete;

        return $this;
    }

    /**
     * Set Valor Total
     *
     * @param int $valor_total
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;

        return $this;
    }

    /**
     * Get identification
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Pessoa
     *
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Get Endereço de Entrega
     *
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function getEnderecoEntrega()
    {
        return $this->enderecoEntrega;
    }

    /**
     * Get Valor Frete
     *
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getValorFrete()
    {
        return $this->valor_frete;
    }

    /**
     * Get Valor Total
     *
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getValorTotal()
    {
        return $this->valor_total;
    }

    /**
     * Get Vendas Item
     *
     * @return \Illuminate\Support\Collection
     */
    public function getVendasItens()
    {
        return $this->itens;
    }
}
