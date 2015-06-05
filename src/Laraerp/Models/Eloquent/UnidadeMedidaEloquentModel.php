<?php namespace Laraerp\Models\Eloquent;

use Laraerp\Contracts\Models\UnidadeMedidaModel;
use Laraerp\Contracts\Models\UnidadeModel;
use Laraerp\UnidadeMedida;

class UnidadeMedidaEloquentModel extends UnidadeMedida implements UnidadeMedidaModel {

    protected $table = 'unidade_medidas';

    /**
     * Belongs to Unidade
     */
    public function unidade() {
        return $this->belongsTo('Laraerp\Models\Eloquent\UnidadeEloquentModel', 'unidade_id', 'id');
    }

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set Unidade da Medida (Massa, Volume..)
     *
     * @param \Laraerp\Contracts\Models\UnidadeModel $unidade
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function setUnidade(UnidadeModel $unidade)
    {
        $this->unidade_id = $unidade->getId();

        return $this;
    }

    /**
     * Set Simbolo (Kg, L, ml..)
     *
     * @param string $simbolo
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function setSimbolo($simbolo)
    {
        $this->simbolo = $simbolo;

        return $this;
    }

    /**
     * Set Fator
     *
     * @param mixed $fator
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function setFator($fator)
    {
        $this->fator = $fator;

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
     * Get Unidade do produto (Massa, Volume..)
     *
     * @return \Laraerp\Contracts\Models\UnidadeModel
     */
    public function getUnidade()
    {
        return $this->unidade;
    }

    /**
     * Get Simbolo
     *
     * @return string
     */
    public function getSimbolo()
    {
        return $this->simbolo;
    }

    /**
     * Get Fator
     *
     * @return mixed
     */
    public function getFator()
    {
        return $this->fator;
    }


}
