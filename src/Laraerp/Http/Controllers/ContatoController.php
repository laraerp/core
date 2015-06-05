<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Contracts\Repositories\ContatoRepository;

class ContatoController extends MainController {


    public function __construct(ContatoRepository $contatoRepository, Request $request){
        $this->contatoRepository = $contatoRepository;
        $this->request = $request;
    }

    /**
     * Salva um Contato
     *
     * @return Response
     */
    public function salvar() {
        try{
            /*
             * Validação
             */
            $this->validate($this->request, [
                'contato.pessoa_id' => 'required',
                'contato.responsavel' => 'required'
            ]);

            $this->contatoRepository->save($this->request->get('contato'));

            return redirect()->back()->with('alert', 'Contato salvo com sucesso!');

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
            $this->contatoRepository->remove($id);

            return redirect()->back()->with('alert', 'Contato removido com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }
}
