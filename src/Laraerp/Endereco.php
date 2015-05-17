<?php

namespace Laraerp;

use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Mask;
use JansenFelipe\Utils\Utils;

class Endereco extends Model {


    protected $table = 'enderecos';

    protected $fillable = ['pessoa_id', 'cep', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade_id'];

    /**
     * Belongs to Pessoa
     */
    public function pessoa() {
        return $this->belongsTo('Laraerp\Pessoa');
    }


    /**
     * Belongs to Cidade
     */
    public function cidade() {
        return $this->belongsTo('Artesaos\Cidade');
    }

    /**
     * Retorna o endereco em uma string
     */
    public function getEndereco(){

        $endereco = $this->getLogradouro() . ' n&ordm;' . $this->getNumero();

        if(!is_null($this->getComplemento()))
            $endereco .= ' ' . $this->getComplemento();

        $endereco .= ' - ' . $this->getBairro() . ' - CEP ' . $this->getCep() . ' - ';
        $endereco .= $this->cidade->nome . '/' . $this->cidade->uf;

        return $endereco;
    }

    /**
     * Getters
     */
    public function getPessoaId(){
        return $this->pessoa_id;
    }

    public function getCep(){
        return Utils::mask($this->cep, Mask::CEP);
    }

    public function getLogradouro() {
        return $this->logradouro;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getComplemento(){
        return $this->complemento;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function getCidadeId(){
        return $this->cidade_id;
    }

    /**
     * Setters
     */
    public function setPessoaId($pessoa_id){
        $this->pessoa_id = $pessoa_id;
    }

    public function setCep($cep){
        $this->cep = Utils::unmask($cep);
    }

    public function setLogradouro($logradouro){
        $this->logradouro = $logradouro;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function setCidadeId($cidade_id){
        $this->cidade_id = $cidade_id;
    }


}
