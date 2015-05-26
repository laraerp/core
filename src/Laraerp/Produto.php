<?php

namespace Laraerp;

use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Utils;
use Laraerp\Ordination\OrdinationTrait;

class Produto extends Model {

    use OrdinationTrait;

    protected $table = 'produtos';

    protected $fillable = ['codigo', 'nome', 'valor_unitario', 'unidade_medida_id'];


    /**
     * Belongs to UnidadeMedida
     */
    public function unidadeMedida() {
        return $this->belongsTo('Laraerp\UnidadeMedida');
    }

    /**
     * Getters
     */
    public function getCodigo(){
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getValorUnitario(){
        return Utils::moeda($this->valor_unitario);
    }

    public function getUnidadeMedidaId(){
        return $this->unidade_medida_id;
    }

    /**
     * Setters
     */
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setValorUnitario($valor_unitario){
        $this->valor_unitario = $valor_unitario;
    }

    public function setUnidadeMedidaId($unidade_medida_id){
        $this->unidade_medida_id = $unidade_medida_id;
    }


}
