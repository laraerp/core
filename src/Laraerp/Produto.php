<?php

namespace Laraerp;

use Illuminate\Database\Eloquent\Model;
use Laraerp\Ordination\OrdinationTrait;

class Produto extends Model {

    use OrdinationTrait;

    protected $table = 'produtos';

    protected $fillable = ['codigo', 'nome', 'valor', 'ncm_id', 'cfop_id', 'unidade_id'];

    /**
     * Belongs to NCM
     */
    public function ncm() {
        return $this->belongsTo('Laraerp\Ncm');
    }

    /**
     * Belongs to CFOP
     */
    public function cfop() {
        return $this->belongsTo('Laraerp\Cfop');
    }

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

    public function getNcmId(){
        return $this->ncm_id;
    }

    public function getCfopId(){
        return $this->cfop_id;
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

    public function setNcmId($ncm_id){
        $this->ncm_id = $ncm_id;
    }

    public function setCfopId($cfop_id){
        $this->cfop_id = $cfop_id;
    }

    public function setUnidadeId($unidade_id){
        $this->unidade_id = $unidade_id;
    }


}
