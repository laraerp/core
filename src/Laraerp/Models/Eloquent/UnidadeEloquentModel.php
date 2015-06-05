<?php namespace Laraerp\Models\Eloquent;

use Laraerp\Contracts\Models\UnidadeModel;
use Laraerp\Unidade;

class UnidadeEloquentModel extends Unidade implements UnidadeModel {

    protected $table = 'unidades';

    /**
     * HasMany to UnidadeMedidas
     */
    public function unidadeMedidas() {
        return $this->hasMany('Laraerp\Models\Eloquent\UnidadeMedidaEloquentModel', 'unidade_id', 'id');
    }

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\UnidadeModel
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
     * @return \Laraerp\Contracts\Models\UnidadeModel
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

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
     * Get Unidades de Medida
     *
     * @return \Illuminate\Support\Collection
     */
    public function getUnidadeMedidas()
    {
        return $this->unidadeMedidas;
    }
}
