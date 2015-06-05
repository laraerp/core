<?php namespace Laraerp\Contracts\Models;

interface UnidadeModel{

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\UnidadeModel
     */
    public function setId($id);

    /**
     * Set Nome
     *
     * @param string $nome
     * @return \Laraerp\Contracts\Models\UnidadeModel
     */
    public function setNome($nome);


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
     * Get Unidades de Medida
     *
     * @return \Illuminate\Support\Collection
     */
    public function getUnidadeMedidas();


}