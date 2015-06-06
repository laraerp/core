<?php namespace Laraerp\Contracts\Models;


interface EmpresaModel{

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\EmpresaModel
     */
    public function setId($id);

    /**
     * Set Pessoa
     *
     * @param \Laraerp\Contracts\Models\PessoaModel $pessoa
     * @return \Laraerp\Contracts\Models\EmpresaModel
     */
    public function setPessoa(PessoaModel $pessoa);

    /**
     * Set Inscriçao estadual
     *
     * @param string $inscricao_estadual
     * @return \Laraerp\Contracts\Models\EmpresaModel
     */
    public function setInscricaoEstadual($inscricao_estadual);

    /**
     * Set Inscriçao municipal
     *
     * @param string $inscricao_municipal
     * @return \Laraerp\Contracts\Models\EmpresaModel
     */
    public function setInscricaoMunicipal($inscricao_municipal);


    /**
     * Get identification
     *
     * @return int
     */
    public function getId();

    /**
     * Get Pessoa
     *
     * @return \Laraerp\Contracts\Models\EmpresaModel
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

}
