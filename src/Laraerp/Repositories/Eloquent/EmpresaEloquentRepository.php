<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Models\EmpresaModel;
use Laraerp\Contracts\Repositories\EmpresaRepository;
use Laraerp\Contracts\Repositories\PessoaRepository;

class EmpresaEloquentRepository implements EmpresaRepository{

    function __construct(EmpresaModel $empresaModel, PessoaRepository $pessoaRepository)
    {
        $this->empresa = $empresaModel;
        $this->pessoaRepository = $pessoaRepository;
    }

    /**
     * Retorna a Empresa
     *
     * @return \Laraerp\Contracts\Models\EmpresaModel
     */
    public function getEmpresa()
    {
        return $this->empresa->first();
    }

    /**
     * Salva dados da Empresa
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\EmpresaModel
     */
    public function save(array $params)
    {
        $empresa = $this->getEmpresa();

        if(!is_null($empresa))
            $this->empresa = $empresa;

        /*
         * Verificando se existe uma Pessoa com o "pessoa_id" ou "documento" informado
         */
        $pessoa = null;

        if(isset($params['pessoa_id']))
            $pessoa = $this->pessoaRepository->getById($params['pessoa_id']);
        else if(isset($params['documento']))
            $pessoa = $this->pessoaRepository->getByDocumento($params['documento']);


        /*
         * Verificando se encontrou a pessoa..
         * Se não encontrar, tenta criar uma
         */
        if(!is_null($pessoa)){

            //Salvando dados
            $params['id'] = $pessoa->getId();
            $this->pessoaRepository->save($params);

            $empresa = $pessoa->getEmpresa();

            /*
             * Verificando se a pessoa ja é uma empresa
             */
            if(!is_null($empresa))
                $this->empresa = $empresa;
            else
                $this->empresa->setPessoa($pessoa);
        }else
            $this->empresa->setPessoa($this->pessoaRepository->save($params));


        if(isset($params['inscricao_estadual']))
            $this->empresa->setInscricaoEstadual($params['inscricao_estadual']);

        if(isset($params['inscricao_municipal']))
            $this->empresa->setInscricaoMunicipal($params['inscricao_municipal']);


        /*
         * Salvando
         */
        $this->empresa->save();

        return $this->empresa;

    }


}