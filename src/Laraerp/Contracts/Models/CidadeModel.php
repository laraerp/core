<?php namespace Laraerp\Contracts\Models;

use Laraerp\Contracts\Model;

interface CidadeModel extends Model {

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