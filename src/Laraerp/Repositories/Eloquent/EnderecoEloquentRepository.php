<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Models\EnderecoModel;
use Laraerp\Contracts\Repositories\CidadeRepository;
use Laraerp\Contracts\Repositories\EnderecoRepository;
use Laraerp\Contracts\Repositories\PessoaRepository;

class EnderecoEloquentRepository implements EnderecoRepository{

    /**
     * Constructor
     *
     * @param \Laraerp\Contracts\Models\EnderecoModel $enderecoModel
     * @param \Laraerp\Contracts\Repositories\PessoaRepository $pessoaRepository
     * @param \Laraerp\Contracts\Repositories\CidadeRepository $cidadeRepository
     */
    function __construct(EnderecoModel $enderecoModel, PessoaRepository $pessoaRepository, CidadeRepository $cidadeRepository)
    {
        $this->endereco = $enderecoModel;
        $this->pessoaRepository = $pessoaRepository;
        $this->cidadeRepository = $cidadeRepository;
    }

    /**
     * Returns a specific model by identifier
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function getById($id)
    {
        return $this->endereco->find($id);
    }

    /**
     * Save data in repository
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\EnderecoModel
     */
    public function save(array $params)
    {
        if(isset($params['id']) && $params['id']>0)
            $this->endereco = $this->endereco->find($params['id']);

        /*
         * Verificando se foi informado pessoa_id para vincular ao endereço.
         * Caso contrário, insere uma pessoa.
         */
        if(isset($params['pessoa_id']))
            $this->endereco->setPessoa($this->pessoaRepository->getById($params['pessoa_id']));
        else
            $this->endereco->setPessoa($this->pessoaRepository->save($params));


        if(isset($params['complemento']))
            $this->endereco->setComplemento($params['complemento']);


        $this->endereco->setCep($params['cep']);
        $this->endereco->setLogradouro($params['logradouro']);
        $this->endereco->setNumero($params['numero']);
        $this->endereco->setBairro($params['bairro']);
        $this->endereco->setCidade($this->cidadeRepository->getById($params['cidade_id']));

        /*
         * Salvando
         */
        $this->endereco->save();

        return $this->endereco;
    }

    /**
     * Remove Endereço do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id)
    {
        return $this->getById($id)->delete();
    }
}