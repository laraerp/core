<?php namespace Laraerp\Contracts\Repositories;

interface PessoaRepository {

    /**
     * Retorna uma Pessoa
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function getById($id);

    /**
     * Salva uma Pessoa no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function save(array $params);

    /**
     * Remove Pessoa do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id);

    /**
     * Pesquisa no repositorio uma pessoa pelo documento.
     *
     * @param string $documento
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function getByDocumento($documento);
}