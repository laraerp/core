<?php namespace Laraerp\Contracts\Models;

interface CidadeModel{

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\CidadeModel
     */
    public function setId($id);

    /**
     * Set Nome
     *
     * @param string $nome
     * @return \Laraerp\Contracts\Models\CidadeModel
     */
    public function setNome($nome);

    /**
     * Set UF
     *
     * @param string $razao_apelido
     * @return \Laraerp\Contracts\Models\CidadeModel
     */
    public function setUF($uf);

    /**
     * Get identification
     *
     * @return int
     */
    public function getId();

    /**
     * Get Nome
     *
     * @return string
     */
    public function getNome();

    /**
     * Get UF
     *
     * @return string
     */
    public function getUF();


}