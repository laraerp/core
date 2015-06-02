<?php namespace Laraerp\Models\Eloquent;

use Artesaos\Cidade;
use Illuminate\Database\Eloquent\Model;
use Laraerp\Contracts\Models\CidadeModel;

class CidadeEloquentModel extends Cidade implements CidadeModel {

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
     * Set Nome
     *
     * @param string $nome
     * @return \Laraerp\Contracts\Models\CidadeModel
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Set UF
     *
     * @param string $razao_apelido
     * @return \Laraerp\Contracts\Models\CidadeModel
     */
    public function setUF($uf)
    {
        $this->uf = $uf;

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
     * Get Nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get UF
     *
     * @return string
     */
    public function getUF()
    {
        return $this->uf;
    }
}
