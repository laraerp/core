<?php

namespace Laraerp;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Mask;
use JansenFelipe\Utils\Utils;

class Pessoa extends Model {

    protected $table = 'pessoas';

    protected $fillable = ['nome', 'razao_apelido', 'documento', 'nascimento_fundacao'];

    protected $dates = ['nascimento_fundacao', 'created_at', 'updated_at'];

    /**
     * HasOne to Cliente
     */
    public function cliente() {
        return $this->hasOne('Laraerp\Cliente');
    }

    /**
     * HasMany to Endereco
     */
    public function enderecos() {
        return $this->hasMany('Laraerp\Endereco');
    }

    /**
     * HasMany to Contato
     */
    public function contatos() {
        return $this->hasMany('Laraerp\Contato');
    }

    /**
     * Getters
     */
    public function getNome(){
        return $this->nome;
    }

    public function getRazaoApelido(){
        return $this->razao_apelido;
    }

    public function getDocumento(){
        return Utils::mask($this->documento, Mask::DOCUMENTO);
    }

    public function getNascimentoFundacao(){
        return $this->nascimento_fundacao->format('d/m/Y');
    }

    /**
     * Setters
     */
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setRazaoApelido($razao_apelido){
        $this->razao_apelido = $razao_apelido;
    }

    public function setDocumento($documento){
        $this->documento = Utils::unmask($documento);
    }

    public function setNascimentoFundacao($nascimento_fundacao){
        if(!is_null($nascimento_fundacao) && strlen($nascimento_fundacao)>0)
            $this->nascimento_fundacao = Carbon::createFromTimestamp(strtotime($nascimento_fundacao));
    }
}
