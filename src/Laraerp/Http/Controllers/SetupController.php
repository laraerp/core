<?php namespace Laraerp\Http\Controllers;

use Laraerp\Contracts\Repositories\ContatoRepository;
use Laraerp\Contracts\Repositories\EmpresaRepository;
use Laraerp\Contracts\Repositories\EnderecoRepository;
use Laraerp\Http\Requests\SetupSalvarRequest;

class SetupController extends MainController {


    function __construct(EmpresaRepository $empresaRepository, EnderecoRepository $enderecoRepository, ContatoRepository $contatoRepository)
    {
        $this->empresaRepository = $empresaRepository;
        $this->enderecoRepository = $enderecoRepository;
        $this->contatoRepository = $contatoRepository;
    }

    public function index() {
        $empresa = $this->empresaRepository->getEmpresa();

        if(is_null($empresa))
            return view('setup.index');
        else
            return view('setup.start', compact('empresa'));
    }

    /**
     * Salva as dados da empresa
     *
     * @return Response
     */
    public function salvar(SetupSalvarRequest $request) {

        /*
         * Salvando empresa
         */
        $empresa = $this->empresaRepository->save($request->all());

        /*
         * Salvando endereço caso informe algum
         */
        $endereco = $request->get('endereco');
        $endereco['pessoa_id'] = $empresa->getPessoa()->getId();

        $this->enderecoRepository->save($endereco);


        /*
         * Salvando contato caso informe algum
         */
        $contato = $request->get('contato');
        $contato['pessoa_id'] = $empresa->getPessoa()->getId();

        $this->contatoRepository->save($contato);


        return redirect(route('setup.index'));
    }

}
