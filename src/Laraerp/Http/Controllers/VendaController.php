<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Cliente;
use Laraerp\Contracts\Repositories\ClienteRepository;
use Laraerp\Contracts\Repositories\ProdutoRepository;
use Laraerp\Contracts\Repositories\VendaRepository;
use Laraerp\Venda;

class VendaController extends MainController {


    public function __construct(VendaRepository $vendaRepository, ClienteRepository $clienteRepository, ProdutoRepository $produtoRepository, Request $request){
        $this->vendaRepository = $vendaRepository;
        $this->clienteRepository = $clienteRepository;
        $this->produtoRepository = $produtoRepository;
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
     * Cadastra uma venda para um Cliente
     *
     * @param  int $idCliente
     * @return Response
     */
    public function cadastrar($idCliente)  {
        try {

            $cliente = $this->clienteRepository->getById($idCliente);

            $venda = $this->vendaRepository->save([
                'cliente_id' => $cliente->getId()
            ]);

            return redirect(route('venda.ver', $venda->id));

        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }

    /**
     * Visualiza a venda
     *
     * @param  int $idVenda
     * @return Response
     */
    public function ver($idVenda) {
        try{
            $venda = $this->vendaRepository->getById($idVenda);

            return view('venda.ver')->with(compact('venda'));
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }

    /**
     * Exclusão de Venda
     *
     * @param  int $idVenda
     * @return Response
     */
    public function deletar($idVenda) {
        try {
            $this->vendaRepository->remove($idVenda);

            return redirect()->back()->with('alert', 'Venda excluida com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }

    /**
     * Formulario para adição de item na venda
     *
     * @param  int $idVenda
     * @return Response
     */
    public function adicionarItem($idVenda) {
        try{
            $venda = $this->vendaRepository->getById($idVenda);

            $like = $this->request->get('like');
            $order = $this->request->get('order', 'ASC');
            $by = $this->request->get('by', 'descricao');

            $produtos = $this->produtoRepository->order($by, $order)->whereLike($like)->all();


            return view('venda.adicionarItem')->with(compact('venda', 'produtos'));
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }

}
