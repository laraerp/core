<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Models\ContatoModel;
use Laraerp\Contracts\Repositories\ContatoRepository;
use Laraerp\Contracts\Repositories\PessoaRepository;

class ContatoEloquentRepository implements ContatoRepository{

    /**
     * Constructor
     *
     * @param \Laraerp\Contracts\Models\ContatoModel $contatoModel
     * @param \Laraerp\Contracts\Repositories\PessoaRepository $pessoaRepository
     */
    function __construct(ContatoModel $contatoModel, PessoaRepository $pessoaRepository)
    {
        $this->contato = $contatoModel;
        $this->pessoaRepository = $pessoaRepository;
    }

    /**
     * Returns a specific model by identifier
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function getById($id)
    {
        return $this->contato->find($id);
    }

    /**
     * Save data in repository
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function save(array $params)
    {
        if(isset($params['id']) && $params['id']>0)
            $this->contato = $this->contato->find($params['id']);

        /*
         * Verificando se foi informado pessoa_id para vincular ao contato.
         * Caso contrário, insere uma pessoa.
         */
        if(isset($params['pessoa_id']))
            $this->contato->setPessoa($this->pessoaRepository->getById($params['pessoa_id']));
        else
            $this->contato->setPessoa($this->pessoaRepository->save($params));

        $this->contato->setResponsavel($params['responsavel']);

        if(isset($params['email']))
            $this->contato->setEmail($params['email']);

        if(isset($params['celular']))
            $this->contato->setCelular($params['celular']);

        if(isset($params['telefone']))
            $this->contato->setTelefone($params['telefone']);

        /*
         * Salvando
         */
        $this->contato->save();

        return $this->contato;
    }

    /**
     * Remove Contato do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id)
    {
        return $this->getById($id)->delete();
    }
}