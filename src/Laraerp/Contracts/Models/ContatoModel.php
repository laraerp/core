<?php namespace Laraerp\Contracts\Models;


interface ContatoModel {

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
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setPessoa(PessoaModel $pessoa);

    /**
     * Set Responsavel
     *
     * @param string $responsavel
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setResponsavel($responsavel);

    /**
     * Set Email
     *
     * @param string $email
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setEmail($email);

    /**
     * Set Telefone
     *
     * @param string $telefone
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setTelefone($telefone);

    /**
     * Set Celular
     *
     * @param string $celular
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setCelular($celular);

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
     * Get Responsavel
     *
     * @return string
     */
    public function getResponsavel();

    /**
     * Get Email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Get Telefone
     *
     * @return string
     */
    public function getTelefone();

    /**
     * Get Celular
     *
     * @return string
     */
    public function getCelular();

}