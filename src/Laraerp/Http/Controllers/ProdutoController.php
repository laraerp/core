<?php

namespace Laraerp\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use JansenFelipe\Utils\Utils;
use Laraerp\Cliente;
use Laraerp\Contato;
use Laraerp\Contracts\Repositories\ProdutoRepository;
use Laraerp\Contracts\Repositories\UnidadeRepository;
use Laraerp\Endereco;
use Laraerp\Http\Requests\ProdutoSalvarRequest;
use Laraerp\Pessoa;
use Laraerp\Produto;

class ProdutoController extends MainController {

    public function __construct(ProdutoRepository $produtoRepository, UnidadeRepository $unidadeRepository){
        $this->produtoRepository = $produtoRepository;
        $this->unidadeRepository = $unidadeRepository;
    }

    /**
     * Lista de produtos
     *
     * @return Response
     */
    public function index(Request $request) {

        $like = $request->get('like');
        $order = $request->get('order', 'ASC');
        $by = $request->get('by', 'descricao');

        $produtos = $this->produtoRepository->order($by, $order)->whereLike($like)->paginate(15);


        return view('produto.index', compact('produtos'));
    }

    /**
     * Exibe formulário para criação de produto
     *
     * @return Response
     */
    public function form() {
        $unidades = $this->unidadeRepository->order('nome', 'ASC')->all();

        return view('produto.form', compact('unidades'));
    }

    /**
     * Salva um produto
     *
     * @return Response
     */
    public function salvar(ProdutoSalvarRequest $request) {

        /*
         * Salvando produto
         */
        $produto = $this->produtoRepository->save($request->all());

        return redirect(route('produto.ver', $produto->id))->with('alert', 'O produto foi salvo com sucesso!');
    }

    /**
     * Visualiza um Produto
     *
     * @return Response
     */
    public function ver($idProduto) {
        try{
            $produto = $this->produtoRepository->getById($idProduto);

            $unidades = $this->unidadeRepository->order('nome', 'ASC')->all();

            return view('produto.ver')->with(compact('produto', 'unidades'));
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }

}
