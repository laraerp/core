<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Cliente;
use Laraerp\Produto;
use Laraerp\Unidade;
use Laraerp\Venda;
use Laraerp\VendaItem;

class VendaItemController extends MainController {


    public function __construct(Request $request){
        $this->request = $request;
    }

    /**
     * Exibe formulário para adição de item na Venda
     *
     * @param  Venda $cliente
     * @return Response
     */
    public function form(Venda $venda, Produto $produto) {
        /*
         * Order
         */
        $order = $this->request->get('order', 'ASC');
        $by = $this->request->get('by', 'nome');

        $builder = $produto->orderBy($by, $order)->select('produtos.*');


        /*
         * Filtrar LIKE
         */
        if($this->request->get('like'))
            $builder = $builder->where('nome', 'like', '%' . $this->request->get('like') . '%');


        /*
         * Paginate
         */
        $produtos = $builder->paginate($this->request->get('limit', 15));

        /*
         * Carregando unidades de medida
         */
        $unidades = Unidade::with('unidadeMedidas')->get();

        return view('vendaItem.form', compact('produtos', 'venda', 'unidades'));

    }

    /**
     * Adicionar um item na Venda
     *
     * @return Response
     */
    public function adicionar(Venda $venda) {
        try {
            //TODO

            return redirect()->back()->with('alert', 'Item incluido com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }

    /**
     * Remover um item da Venda
     *
     * @param  Cliente $cliente
     * @return Response
     */
    public function remover(VendaItem $vendaItem) {
        try {
            $vendaItem->delete();
            return redirect()->back()->with('alert', 'Item excluido com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }


}
