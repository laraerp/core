<?php namespace Laraerp\Contracts\Repositories;


interface EnderecoRepository {

    /**
     * Retorna um Endereço
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function getById($id);

    /**
     * Salva um Endereço no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function save(array $params);

    /**
     * Remove Endereço do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id);

}