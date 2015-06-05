<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Contracts\Repositories\ClienteRepository;
use Laraerp\Contracts\Repositories\ContatoRepository;
use Laraerp\Contracts\Repositories\EnderecoRepository;
use Laraerp\Http\Requests\ClienteSalvarRequest;

class ClienteController extends MainController {

    protected $tag;
    protected $request;

    public function __construct(ClienteRepository $clienteRepository, EnderecoRepository $enderecoRepository, ContatoRepository $contatoRepository){
        $this->clienteRepository = $clienteRepository;
        $this->enderecoRepository = $enderecoRepository;
        $this->contatoRepository = $contatoRepository;
    }

    /**
     * Lista de clientes
     *
     * @return Response
     */
    public function index(Request $request) {

        $like = $request->get('like');
        $order = $request->get('order', 'ASC');
        $by = $request->get('by', 'pessoa.nome');

        $clientes = $this->clienteRepository->order($by, $order)->whereLike($like)->paginate(15);

        return view('cliente.index', compact('clientes'));
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
     * Salva um cliente
     *
     * @return Response
     */
    public function salvar(ClienteSalvarRequest $request) {

        /*
         * Salvando cliente
         */
        $cliente = $this->clienteRepository->save($request->all());

        /*
         * Salvando endereço caso informe algum
         */
        if($request->enderecoPreenchido()){
            $endereco = $request->get('endereco');
            $endereco['pessoa_id'] = $cliente->getPessoa()->getId();

            $this->enderecoRepository->save($endereco);
        }

        /*
         * Salvando contato caso informe algum
         */
        if($request->contatoPreenchido()){
            $contato = $request->get('contato');
            $contato['pessoa_id'] = $cliente->getPessoa()->getId();

            $this->contatoRepository->save($contato);
        }

        return redirect(route('cliente.ver', $cliente->id))->with('alert', 'O cliente foi salvo com sucesso!');
    }

    /**
     * Visualiza um cliente
     *
     * @return Response
     */
    public function ver($idCliente) {
        try{
            $cliente = $this->clienteRepository->getById($idCliente);

            $pessoa = $cliente->getPessoa()->toArray();
            $pessoa['nascimento_fundacao'] =  $cliente->getPessoa()->getNascimentoFundacao();

            return view('cliente.ver')->with(compact('cliente', 'pessoa'));
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }
}
