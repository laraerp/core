<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Venda;

class VendaController extends MainController {

    protected $venda;
    protected $request;

    public function __construct(Venda $venda, Request $request){
        $this->venda = $venda;
        $this->request = $request;
    }

    /**
     * Lista de vendas
     *
     * @return Response
     */
    public function index() {

        /*
         * Order
         */
        $order = $this->request->get('order', 'DESC');
        $by = $this->request->get('by', 'id');

        $builder = $this->venda->orderBy($by, $order)->select('vendas.*');

        /*
         * Filtrar LIKE
         */
        if($this->request->get('like')){

            $builder = $builder->where(function($q) {

                $q->whereHas('cliente', function ($query) {

                    $query->whereHas('pessoa', function ($query) {
                        $query->where(function ($query) {
                            $query->where('nome', 'like', '%' . $this->request->get('like') . '%');
                        });
                    });
                });

            });
        }

        /*
         * Paginate
         */
        $vendas = $builder->paginate($this->request->get('limit', 15));

        return view('venda.index', compact('vendas'));
    }

    /**
     * Visualiza a venda
     *
     *
     * @param  Cliente $cliente
     * @return Response
     */
    public function ver(Cliente $cliente) {
        return view('cliente.ver')->with(compact('cliente'));
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
