<?php namespace Laraerp\Contracts\Repositories;

use Laraerp\Contracts\Repository;

interface ClienteRepository extends Repository {

    /**
     * Aplica um filtro para retornar apenas clientes
     * que possui Nome, Razão Social ou Documento com
     * a string $like
     *
     * @param null $like
     * @return \Laraerp\Contracts\Repositories\ClienteRepository
     */
    public function whereLike($like = null);


}