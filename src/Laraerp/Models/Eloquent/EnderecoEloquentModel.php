<?php

namespace Laraerp\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Mask;
use JansenFelipe\Utils\Utils;
use Laraerp\Contracts\Models\EnderecoModel;
use Laraerp\Contracts\Models\PessoaModel;

class EnderecoEloquentModel extends Model implements EnderecoModel {

    protected $table = 'enderecos';

    /**
     * Belongs to Pessoa
     */
    public function pessoa() {
        return $this->belongsTo('Laraerp\Models\Eloquent\PessoaEloquentModel', 'pessoa_id', 'id');
    }

    /**
     * Belongs to Cidade
     */
    public function cidade() {
        return $this->belongsTo('Laraerp\Models\Eloquent\CidadeEloquentModel', 'pessoa_id', 'id');
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
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Model
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
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setPessoa(PessoaModel $pessoa)
    {
        $this->pessoa_id = $pessoa->getId();

        return $this;
    }

    /**
     * Set Cep
     *
     * @param string $cep
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setCep($cep)
    {
        $this->cep = Utils::unmask($cep);

        return $this;
    }

    /**
     * Set Logradouro
     *
     * @param string $logradouro
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Set Numero
     *
     * @param string $numero
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Set Complemento
     *
     * @param string $complemento
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Set Bairro
     *
     * @param string $bairro
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Set Cidade
     *
     * @param \Laraerp\Contracts\Models\CidadeModel $cidade
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setCidade($cidade)
    {
        $this->cidade_id = $cidade->getId();

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
     * Get Cep
     *
     * @return string
     */
    public function getCep()
    {
        return Utils::mask($this->cep, Mask::CEP);
    }

    /**
     * Get Logradouro
     *
     * @return string
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Get Numero
     *
     * @return string
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Get Complemento
     *
     * @return string
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Get Bairro
     *
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Get Cidade
     *
     * @return \Laraerp\Contracts\Models\CidadeModel
     */
    public function getCidade()
    {
        return $this->cidade;
    }
}
