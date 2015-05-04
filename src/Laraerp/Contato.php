<?php

namespace Laraerp;

use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Mask;
use JansenFelipe\Utils\Utils;

class Contato extends Model {

    protected $table = 'contatos';

    protected $fillable = ['pessoa_id', 'responsavel', 'telefone', 'celular', 'email'];

    /**
     * Belongs to Pessoa
     */
    public function pessoa() {
        return $this->belongsTo('Laraerp\Pessoa');
    }

    /**
     * Getters
     */
    public function getPessoaId(){
        return $this->pessoa_id;
    }

    public function getResponsavel(){
        return $this->responsavel;
    }

    public function getTelefone(){
        return Utils::mask($this->telefone, Mask::TELEFONE);
    }

    public function getCelular(){
        return Utils::mask($this->celular, Mask::TELEFONE);
    }

    public function getEmail(){
        return $this->email;
    }

    /**
     * Setters
     */
    public function setPessoaId($pessoa_id){
        $this->pessoa_id = $pessoa_id;
    }

    public function setResponsavel($responsavel){
        $this->responsavel = $responsavel;
    }

    public function setTelefone($telefone){
        $this->telefone = Utils::unmask($telefone);
    }

    public function setCelular($celular){
        $this->celular = Utils::unmask($celular);
    }

    public function setEmail($email){
        $this->email = $email;
    }
}
