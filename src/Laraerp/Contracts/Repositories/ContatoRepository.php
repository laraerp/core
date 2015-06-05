<?php namespace Laraerp\Contracts\Repositories;

interface ContatoRepository {

    /**
     * Retorna um Contato
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function getById($id);

    /**
     * Salva um Contato no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function save(array $params);

    /**
     * Remove Contato do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id);
}