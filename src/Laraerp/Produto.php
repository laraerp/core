<?php

namespace Laraerp;

use Illuminate\Database\Eloquent\Model;
use Laraerp\Ordination\OrdinationTrait;

class Produto extends Model {

    use OrdinationTrait;

    protected $table = 'produtos';

    protected $fillable = ['codigo', 'nome', 'valor', 'unidade_id'];


    /**
     * Belongs to Unidade
     */
    public function unidade() {
        return $this->belongsTo('Laraerp\Unidade');
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

    public function getValor(){
        return $this->valor;
    }

    public function getUnidadeId(){
        return $this->unidade_id;
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

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function setUnidadeId($unidade_id){
        $this->unidade_id = $unidade_id;
    }


}
