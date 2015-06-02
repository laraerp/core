<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Contracts\Repositories\ClienteRepository;
use Laraerp\Tag;

class ClienteController extends MainController {

    protected $tag;
    protected $request;

    public function __construct(ClienteRepository $clienteRepository, Tag $tag, Request $request){
        $this->clienteRepository = $clienteRepository;
        $this->tag = $tag;
        $this->request = $request;
    }

    /**
     * Lista de clientes
     *
     * @return Response
     */
    public function index() {

        $like = $this->request->get('like');
        $order = $this->request->get('order', 'ASC');
        $by = $this->request->get('by', 'pessoa.nome');

        $clientes = $this->clienteRepository->order($by, $order)->whereLike($like)->paginate(15);

        /*
         * Listando Tags de Clientes
         */
        $tags = $this->tag->where('tabela', 'clientes')->distinct()->get(['nome']);

        return view('cliente.index', compact('clientes', 'tags'));
    }

    /**
     * Exibe formulário para criação de cliente
     *
     * @return Response
     */
    public function form() {
        return view('cliente.form');
    }

    /**
     * Cadastra um cliente
     *
     * @return Response
     */
    public function cadastrar() {
        try{
            /*
             * Validação
             */
            $this->validate($this->request, [
                'nome' => 'required',
                'documento' => 'required',
            ]);

            $cliente = $this->clienteRepository->save($this->request->all());

            return redirect(route('cliente.ver', $cliente->id));

        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }

    /**
     * Cadastra um cliente
     *
     * @return Response
     */
    public function ver($idCliente) {
        try{
            $cliente = $this->clienteRepository->getById($idCliente);

            return view('cliente.ver')->with(compact('cliente'));
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }
}
