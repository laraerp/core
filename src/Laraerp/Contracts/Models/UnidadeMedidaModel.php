<?php namespace Laraerp\Contracts\Models;

interface UnidadeMedidaModel{

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function setId($id);

    /**
     * Set Unidade da Medida (Massa, Volume..)
     *
     * @param \Laraerp\Contracts\Models\UnidadeModel $unidade
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function setUnidade(UnidadeModel $unidade);

    /**
     * Set Simbolo (Kg, L, ml..)
     *
     * @param string $simbolo
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function setSimbolo($simbolo);

    /**
     * Set Fator
     *
     * @param mixed $fator
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function setFator($fator);


    /**
     * Get identification
     *
     * @return int
     */
    public function getId();

    /**
     * Get Unidade do produto (Massa, Volume..)
     *
     * @return \Laraerp\Contracts\Models\UnidadeModel
     */
    public function getUnidade();

    /**
     * Get Simbolo
     *
     * @return string
     */
    public function getSimbolo();

    /**
     * Get Fator
     *
     * @return mixed
     */
    public function getFator();



}