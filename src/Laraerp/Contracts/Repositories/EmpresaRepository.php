<?php namespace Laraerp\Contracts\Repositories;


interface EmpresaRepository{

    /**
     * Retorna a Empresa
     *
     * @return \Laraerp\Contracts\Models\EmpresaModel
     */
    public function getEmpresa();

    /**
     * Salva dados da Empresa
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\EmpresaModel
     */
    public function save(array $params);
}