<?php namespace Laraerp\Contracts\Models;

interface ProdutoModel {

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function setId($id);

    /**
     * Set Código
     *
     * @param string $codigo
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function setCodigo($codigo);

    /**
     * Set Descrição
     *
     * @param string $descricao
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function setDescricao($descricao);

    /**
     * Set Unidade do produto (Massa, Volume..)
     *
     * @param \Laraerp\Contracts\Models\UnidadeModel $unidade
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function setUnidade(UnidadeModel $unidade);

    /**
     * Get identification
     *
     * @return int
     */
    public function getId();

    /**
     * Get Código
     *a
     * @return string
     */
    public function getCodigo();

    /**
     * Get Descrição
     *
     * @return string
     */
    public function getDescricao();

    /**
     * Get Unidade do produto (Massa, Volume..)
     *
     * @return \Laraerp\Contracts\Models\UnidadeModel
     */
    public function getUnidade();

}