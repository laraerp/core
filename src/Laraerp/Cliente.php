<?php

namespace Laraerp;

use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Utils;
use Laraerp\Ordination\OrdinationTrait;
use Laraerp\Tag\TagTrait;

class Cliente extends Model {

    use OrdinationTrait, TagTrait;

    protected $table = 'clientes';

    protected $fillable = ['pessoa_id', 'inscricao_estadual', 'inscricao_municipal', 'retem_issqn'];

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

    public function getInscricaoEstadual(){
        return $this->inscricao_estadual;
    }

    public function getInscricaoMunicipal() {
        return $this->inscricao_municipal;
    }

    public function getRetemIssqn(){
        return $this->retem_issqn;
    }

    /**
     * Setters
     */
    public function setRetemIssqn($retem_issqn){
        $this->retem_issqn = $retem_issqn;
    }

    public function setPessoaId($pessoa_id){
        $this->pessoa_id = $pessoa_id;
    }

    public function setInscricaoEstadual($inscricao_estadual){
        $this->inscricao_estadual = Utils::unmask($inscricao_estadual);
    }

    public function setInscricaoMunicipal($inscricao_municipal){
        $this->inscricao_municipal = Utils::unmask($inscricao_municipal);
    }


}
