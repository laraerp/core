<?php namespace Laraerp;

use Illuminate\Database\Eloquent\Model;
use Laraerp\Ordination\OrdinationTrait;

class Venda extends Model {

    use OrdinationTrait;

    protected $table = 'vendas';

    protected $fillable = ['cliente_id', 'endereco_id', 'valor_bruto', 'valor_desconto', 'valor_acrescimo', 'valor_liquido'];

    /**
     * Belongs to Cliente
     */
    public function cliente() {
        return $this->belongsTo('Laraerp\Cliente');
    }

    /**
     * Belongs to Endereco
     */
    public function endereco() {
        return $this->belongsTo('Laraerp\Endereco');
    }

    /**
     * HasMany VendaItem
     */
    public function itens() {
        return $this->hasMany('Laraerp\VendaItem');
    }

    /**
     * Getters
     */
    public function getClienteId(){
        return $this->cliente_id;
    }

    public function getEnderecoId(){
        return $this->endereco_id;
    }

    public function getValorBruto(){
        return $this->valor_bruto;
    }

    public function getValorDesconto(){
        return $this->valor_desconto;
    }

    public function getValorAcrescimo(){
        return $this->valor_acrescimo;
    }

    public function getValorLiquido(){
        return $this->valor_liquido;
    }

    /**
     * Setters
     */

    public function setClienteId($cliente_id){
        $this->cliente_id = $cliente_id;
    }

    public function setEnderecoId($endreco_id){
        $this->endreco_id = $endreco_id;
    }

    public function setValorBruto($valor_bruto){
        $this->valor_bruto = $valor_bruto;
    }

    public function setValorDesconto($valor_desconto){
        $this->valor_desconto = $valor_desconto;
    }

    public function setValorAcrescimo($valor_acrescimo){
        $this->valor_acrescimo = $valor_acrescimo;
    }

    public function setValorLiquido($valor_liquido){
        $this->valor_liquido = $valor_liquido;
    }

}
