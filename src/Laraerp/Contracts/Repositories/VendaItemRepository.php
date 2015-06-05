<?php namespace Laraerp\Contracts\Repositories;

interface VendaItemRepository {

    /**
     * Salva um Item de Venda no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function save(array $params);

    /**
     * Remove um Item de Venda do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id);

}