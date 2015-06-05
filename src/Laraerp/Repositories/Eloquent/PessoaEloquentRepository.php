<?php namespace Laraerp\Repositories\Eloquent;

use JansenFelipe\Utils\Utils;
use Laraerp\Contracts\Models\PessoaModel;
use Laraerp\Contracts\Repositories\PessoaRepository;

class PessoaEloquentRepository implements PessoaRepository{

    function __construct(PessoaModel $pessoaModel)
    {
        $this->pessoa = $pessoaModel;
    }

    /**
     * Salva uma Pessoa no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function save(array $params)
    {
        if(isset($params['id']) && $params['id']>0)
            $this->pessoa = $this->getById($params['id']);

        $pessoa = $this->getByDocumento($params['documento']);

        if(!is_null($pessoa))
            $this->pessoa = $pessoa;
        else
            $this->pessoa->setDocumento($params['documento']);

        $this->pessoa->setNome($params['nome']);

        if(isset($params['razao_apelido']))
            $this->pessoa->setRazaoApelido($params['razao_apelido']);

        if(isset($params['nascimento_fundacao']))
            $this->pessoa->setNascimentoFundacao($params['nascimento_fundacao']);

        /*
         * Save
         */
        $this->pessoa->save();

        return $this->pessoa;
    }

    /**
     * Returns a specific model by identifier
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function getById($id)
    {
        return $this->pessoa->find($id);
    }

    /**
     * Remove Pessoa do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id){
        return $this->getById($id)->delete();
    }

    /**
     * Pesquisa no repositorio uma pessoa pelo documento.
     *
     * @param string $documento
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function getByDocumento($documento)
    {
        return $this->pessoa->where(['documento' => Utils::unmask($documento)])->first();
    }
}