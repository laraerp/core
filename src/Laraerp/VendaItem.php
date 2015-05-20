<?php namespace Laraerp;

use Illuminate\Database\Eloquent\Model;

class VendaItem extends Model {

    protected $table = 'venda_items';

    protected $fillable = ['venda_id', 'produto_id', 'descricao', 'quantidade', 'unidade_medida', 'valor_bruto', 'valor_desconto', 'valor_acrescimo', 'valor_liquido'];

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

}
