<?php

namespace Laraerp\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Mask;
use JansenFelipe\Utils\Utils;
use Laraerp\Contracts\Models\ContatoModel;
use Laraerp\Contracts\Models\PessoaModel;

class ContatoEloquentModel extends Model implements ContatoModel {

    protected $table = 'contatos';

    /**
     * Belongs to Pessoa
     */
    public function pessoa() {
        return $this->belongsTo('Laraerp\Models\Eloquent\PessoaEloquentModel', 'pessoa_id', 'id');
    }


    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set Pessoa
     *
     * @param \Laraerp\Contracts\Models\PessoaModel $pessoa
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setPessoa(PessoaModel $pessoa)
    {
        $this->pessoa_id = $pessoa->getId();

        return $this;
    }

    /**
     * Set Responsavel
     *
     * @param string $responsavel
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;

        return $this;
    }

    /**
     * Set Email
     *
     * @param string $email
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set Telefone
     *
     * @param string $telefone
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setTelefone($telefone)
    {
        $this->telefone = Utils::unmask($telefone);

        return $this;
    }

    /**
     * Set Celular
     *
     * @param string $celular
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setCelular($celular)
    {
        $this->celular = Utils::unmask($celular);

        return $this;
    }

    /**
     * Get identification
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Pessoa
     *
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * Get Responsavel
     *
     * @return string
     */
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get Telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return Utils::mask($this->telefone, Mask::TELEFONE);
    }

    /**
     * Get Celular
     *
     * @return string
     */
    public function getCelular()
    {
        return Utils::mask($this->celular, Mask::TELEFONE);
    }
}
