<?php namespace Laraerp\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Utils;
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
        return $this->hasMany('Laraerp\Models\Eloquent\VendaItemEloquentModel', 'venda_id', 'id');
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
     * Set data da venda
     *
     * @param mixed
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setData($data)
    {
        try{
            $this->data = Carbon::createFromFormat('d/m/Y', $data);
        }catch (Exception $e){
            throw new Exception('Informe a data no formato DD/MM/YYYY');
        }

        return $this;
    }

    /**
     * Set data da entrega
     *
     * @param mixed
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setDataEntrega($data_entrega)
    {
        try{
            $this->data_entrega = Carbon::createFromFormat('d/m/Y', $data_entrega);
        }catch (Exception $e){
            throw new Exception('Informe a data no formato DD/MM/YYYY');
        }

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
        $this->valor_frete = Utils::unmoeda($valor_frete);

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
        $this->valor_total = Utils::unmoeda($valor_total);

        return $this;
    }

    /**
     * Set Valor Pago
     *
     * @param int $valor_pago
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function setValorPago($valor_pago)
    {
        $this->valor_pago = Utils::unmoeda($valor_pago);

        return $this;
    }

    /**
     * Get identification
     *
     * @param boolean $withFormat
     * @return int
     */
    public function getId($withFormat = false)
    {
        return $withFormat ? str_pad($this->id, 4, '0', STR_PAD_LEFT) : $this->id;
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
     * Get data da venda
     *
     * @return \Carbon\Carbon
     */
    public function getData()
    {
        return !is_null($this->data) ? $this->data->format('d/m/Y') : null;
    }

    /**
     * Get data da entrega
     *
     * @return \Carbon\Carbon
     */
    public function getDataEntrega()
    {
        return !is_null($this->valor_pago) ? $this->valor_pago->format('d/m/Y') : null;
    }

    /**
     * Get Valor Frete
     *
     * @param boolean $withFormat
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getValorFrete($withFormat = true)
    {
        return $withFormat ? Utils::moeda($this->valor_frete) : $this->valor_frete;
    }

    /**
     * Get Valor Total
     *
     * @param boolean $withFormat
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getValorTotal($withFormat = true)
    {
        return $withFormat ? Utils::moeda($this->valor_total) : $this->valor_total;
    }

    /**
     * Get Valor Pago
     *
     * @param boolean $withFormat
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getValorPago($withFormat = true)
    {
        return $withFormat ? Utils::moeda($this->valor_pago) : $this->valor_pago;
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
