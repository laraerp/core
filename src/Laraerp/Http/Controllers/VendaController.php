<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Cliente;
use Laraerp\Contracts\Repositories\ClienteRepository;
use Laraerp\Contracts\Repositories\VendaRepository;
use Laraerp\Venda;

class VendaController extends MainController {


    public function __construct(VendaRepository $vendaRepository, ClienteRepository $clienteRepository, Request $request){
        $this->vendaRepository = $vendaRepository;
        $this->clienteRepository = $clienteRepository;
        $this->request = $request;
    }

    /**
     * Lista de vendas
     *
     * @return Response
     */
    public function index() {

        $like = $this->request->get('like');
        $order = $this->request->get('order', 'ASC');
        $by = $this->request->get('by', 'cliente.pessoa.nome');

        $vendas = $this->vendaRepository->order($by, $order)->whereLike($like)->paginate(15);

        return view('venda.index', compact('vendas'));
    }

    /**
     * Exibe uma lista de cliente para o usuário selecinonar e criar uma Venda
     *
     * @return Response
     */
    public function form() {

        $like = $this->request->get('like');
        $order = $this->request->get('order', 'ASC');
        $by = $this->request->get('by', 'pessoa.nome');

        $clientes = $this->clienteRepository->order($by, $order)->whereLike($like)->paginate(15);

        return view('venda.form', compact('clientes'));

    }

    /**
     * Cadastra uma venda
     *
     * @param  Cliente $cliente
     * @return Response
     */
    public function cadastrar(Cliente $cliente)  {
        try {

            $venda = new Venda();
            $venda->setClienteId($cliente->id);
            $venda->save();

            return redirect(route('venda.ver', $venda->id));

        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }

    /**
     * Visualiza a venda
     *
     *
     * @param  Venda $venda
     * @return Response
     */
    public function ver(Venda $venda) {
        return view('venda.ver')->with(compact('venda'));
    }

    /**
     * Exclusão de Cliente
     *
     * @param  Cliente $cliente
     * @return Response
     */
    public function deletar(Cliente $cliente) {
        try {
            $cliente->delete();
            return redirect()->back()->with('alert', 'Cliente excluido com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }

}
