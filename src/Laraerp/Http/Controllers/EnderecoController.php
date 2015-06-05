<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Contracts\Repositories\EnderecoRepository;

class EnderecoController extends MainController {


    public function __construct(EnderecoRepository $enderecoRepository, Request $request){
        $this->enderecoRepository = $enderecoRepository;
        $this->request = $request;
    }

    /**
     * Salva um Endereço
     *
     * @return Response
     */
    public function salvar() {
        try{

            /*
             * Validação
             */
            $this->validate($this->request, [
                'endereco.pessoa_id' => 'required',
                'endereco.cep' => 'required',
                'endereco.logradouro' => 'required',
                'endereco.numero' => 'required',
                'endereco.bairro' => 'required',
                'endereco.cidade_id' => 'required',
            ]);

            $this->enderecoRepository->save($this->request->get('endereco'));

            return redirect()->back()->with('alert', 'Endereço salvo com sucesso!');

        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove um Contato
     *
     * @param int $id
     * @return Response
     */
    public function remover($id) {
        try{
            $this->enderecoRepository->remove($id);

            return redirect()->back()->with('alert', 'Endereço removido com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }
}
