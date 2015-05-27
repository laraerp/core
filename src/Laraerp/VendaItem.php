<?php namespace Laraerp;

use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Utils;

class VendaItem extends Model {

    protected $table = 'venda_items';

    protected $fillable = ['venda_id', 'produto_id', 'unidade_medida_id', 'codigo', 'descricao', 'quantidade', 'valor_unitario', 'valor_bruto', 'valor_desconto', 'valor_acrescimo', 'valor_liquido'];

    /**
     * Belongs to Venda
     */
    public function venda() {
        return $this->belongsTo('Laraerp\Venda');
    }

    /**
     * Belongs to Produto
     */
    public function produto() {
        return $this->belongsTo('Laraerp\Produto');
    }

    /**
     * Belongs to UnidadeMedida
     */
    public function unidadeMedida() {
        return $this->belongsTo('Laraerp\UnidadeMedida');
    }

    /**
     * Getters
     */
    public function getVendaId(){
        return $this->venda_id;
    }

    public function getProdutoId(){
        return $this->produto_id;
    }

    public function getUnidadeMedidaId(){
        return $this->unidade_medida_id;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getQuantidade(){
        $val = sprintf("%lf", $this->quantidade);

        if (strpos($val, '.') !== false) {
            $val = rtrim(rtrim($val, '0'), '.');
        }

        return $val;
    }

    public function getValorUnitario(){
        return Utils::moeda($this->valor_unitario);
    }

    public function getValorBruto(){
        return Utils::moeda($this->valor_bruto);
    }

    public function getValorDesconto(){
        return Utils::moeda($this->valor_desconto);
    }

    public function getValorAcrescimo(){
        return Utils::moeda($this->valor_acrescimo);
    }

    public function getValorLiquido(){
        return Utils::moeda($this->valor_liquido);
    }
}
