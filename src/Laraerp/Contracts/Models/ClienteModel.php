<?php namespace Laraerp\Contracts\Models;

interface ClienteModel {

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function setId($id);

    /**
     * Set Pessoa
     *
     * @param \Laraerp\Contracts\Models\PessoaModel $pessoa
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function setPessoa(PessoaModel $pessoa);

    /**
     * Set Inscriçao estadual
     *
     * @param string $inscricao_estadual
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function setInscricaoEstadual($inscricao_estadual);

    /**
     * Set Inscriçao municipal
     *
     * @param string $inscricao_municipal
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function setInscricaoMunicipal($inscricao_municipal);

    /**
     * Set Retem ISSQN
     *
     * @param boolean $retem_issqn
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function setRetemIssqn($retem_issqn);

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
     * Get Inscriçao estadual
     *
     * @return string
     */
    public function getInscricaoEstadual();

    /**
     * Get Inscriçao municipal
     *
     * @return string
     */
    public function getInscricaoMunicipal();

    /**
     * Get Retem ISSQN
     *
     * @return boolean
     */
    public function getRetemIssqn();

}