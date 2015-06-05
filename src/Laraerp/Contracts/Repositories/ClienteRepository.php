<?php namespace Laraerp\Contracts\Repositories;


interface ClienteRepository {

    /**
     * Aplica condição $like nos campos Nome, Razão Social e Documento
     *
     * @param null $like
     * @return \Laraerp\Contracts\Repositories\ClienteRepository
     */
    public function whereLike($like = null);

    /**
     * Retorna uma coleção de Clientes com paginação
     *
     * @param null $limit
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = null, array $columns = array('*'));

    /**
     * Aplica ordenação
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repositories\ClienteRepository
     */
    public function order($by = null, $order = null);

    /**
     * Retorna um Cliente
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function getById($id);

    /**
     * Salva um Cliente no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function save(array $params);

    /**
     * Remove Cliente do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id);
}