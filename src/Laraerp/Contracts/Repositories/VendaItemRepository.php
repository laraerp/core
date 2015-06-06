<?php namespace Laraerp\Contracts\Repositories;

interface VendaItemRepository {

    /**
     * Retorna um Item de Venda
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function getById($id);

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