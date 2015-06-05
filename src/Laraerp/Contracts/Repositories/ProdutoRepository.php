<?php namespace Laraerp\Contracts\Repositories;

interface ProdutoRepository {

    /**
     * Aplica condição $like no campo Nome do produto
     *
     * @param null $like
     * @return \Laraerp\Contracts\Repositories\ProdutoRepository
     */
    public function whereLike($like = null);

    /**
     * Aplica ordenação
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repositories\ProdutoRepository
     */
    public function order($by = null, $order = null);

    /**
     * Retorna uma coleção de Produtos com paginação
     *
     * @param null $limit
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = null, array $columns = array('*'));

    /**
     * Retorna registros do repositório
     *
     * @return \Illuminate\Support\Collection
     */
    public function all($like = null);

    /**
     * Retorna um Produto
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function getById($id);

    /**
     * Salva um Produto no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function save(array $params);


    /**
     * Remove Produto do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id);

}