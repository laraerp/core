<?php namespace Laraerp\Contracts;


interface Repository {

    /**
     * Save data in repository
     *
     * @param array $params
     * @return \Laraerp\Contracts\Model
     */
    public function save(array $params);

    /**
     * Retrieve data of repository
     *
     * @param array $columns
     * @param null $limit
     * @param null $offset
     * @return \Illuminate\Support\Collection
     */
    public function retrieve(array $columns = array('*'), $limit = null, $offset = null);

    /**
     * Retrieve all data of repository, paginated
     *
     * @param null $limit
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = null, array $columns = array('*'));

    /**
     * Remove a entity in repository
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repository
     */
    public function order($by = null, $order = null);

    /**
     * Returns a specific model by identifier
     *
     * @param int $id
     * @return \Laraerp\Contracts\Model
     */
    public function getById($id);

}