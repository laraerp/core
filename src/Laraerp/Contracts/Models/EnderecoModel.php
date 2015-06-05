<?php namespace Laraerp\Contracts\Models;


interface EnderecoModel {

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setId($id);

    /**
     * Set Pessoa
     *
     * @param \Laraerp\Contracts\Models\PessoaModel $pessoa
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setPessoa(PessoaModel $pessoa);

    /**
     * Set Cep
     *
     * @param string $cep
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setCep($cep);

    /**
     * Set Logradouro
     *
     * @param string $logradouro
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setLogradouro($logradouro);

    /**
     * Set Numero
     *
     * @param string $numero
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setNumero($numero);

    /**
     * Set Complemento
     *
     * @param string $complemento
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setComplemento($complemento);

    /**
     * Set Bairro
     *
     * @param string $bairro
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setBairro($bairro);

    /**
     * Set Cidade
     *
     * @param \Laraerp\Contracts\Models\CidadeModel $cidade
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function setCidade($cidade);

    /**
     * Get identification
     *
     * @return int
     */
    public function getId();

    /**
     * Get Pessoa
     *
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function getPessoa();

    /**
     * Get Cep
     *
     * @return string
     */
    public function getCep();

    /**
     * Get Logradouro
     *
     * @return string
     */
    public function getLogradouro();

    /**
     * Get Numero
     *
     * @return string
     */
    public function getNumero();

    /**
     * Get Complemento
     *
     * @return string
     */
    public function getComplemento();

    /**
     * Get Bairro
     *
     * @return string
     */
    public function getBairro();

    /**
     * Get Cidade
     *
     * @return \Laraerp\Contracts\Models\CidadeModel
     */
    public function getCidade();

}