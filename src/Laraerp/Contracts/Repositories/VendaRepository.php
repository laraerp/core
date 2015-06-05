<?php namespace Laraerp\Contracts\Repositories;

interface VendaRepository {

    /**
     * Aplica condição $like para pesquisar uma venda relacionada a um Cliente
     *
     * @param null $like
     * @return \Laraerp\Contracts\Repositories\VendaRepository
     */
    public function whereLike($like = null);

    /**
     * Retorna uma coleção de Vendas com paginação
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
     * @return \Laraerp\Contracts\Repositories\VendaRepository
     */
    public function order($by = null, $order = null);

    /**
     * Retorna uma Venda
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getById($id);

    /**
     * Salva uma Venda no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function save(array $params);

    /**
     * Remove Venda do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id);
}