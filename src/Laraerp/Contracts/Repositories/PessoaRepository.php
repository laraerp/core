<?php namespace Laraerp\Contracts\Repositories;

use Laraerp\Contracts\Models\PessoaModel;
use Laraerp\Contracts\Repository;

interface PessoaRepository extends Repository {

    /**
     * Remover uma Pessoa do repositório
     *
     * @param \Laraerp\Contracts\Models\PessoaModel $pessoa
     * @return boolean
     */
    public function remove(PessoaModel $pessoa);

    /**
     * Pesquisa no repositorio uma pessoa com o documento informado.
     *
     * @param string $documento
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function getByDocumento($documento);
}