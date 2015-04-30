<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Cliente;

class ClienteController extends MainController {

    protected $cliente;
    protected $request;

    public function __construct(Cliente $cliente, Request $request){
        $this->cliente = $cliente;
        $this->request = $request;
    }

    /**
     * Lista de clientes
     *
     * @return Response
     */
    public function index() {

        /*
         * Order
         */
        $order = $this->request->get('order', 'ASC');
        $by = $this->request->get('by', 'pessoa.nome');

        $builder = $this->cliente->orderBy($by, $order)->select('clientes.*');


        /*
         * Filtrar LIKE
         */
        if($this->request->get('like')){

            $builder = $builder->where(function($q) {

                $q->orWhereHas('pessoa', function ($query) {
                    $query->where('nome', 'like', '%' . $this->request->get('like') . '%');
                });
                
            });
        }

        /*
         * Paginate
         */
        $clientes = $builder->paginate(15);

        return view('cliente.index', compact('clientes'));
    }

    /**
     * Exibe formulário para criação de cliente
     *
     * @return Response
     */
    public function getCreate() {
        return view('cliente.create');
    }

    /**
     * Visualiza o cadastro do cliente
     *
     * @param  int $id
     * @return Response
     */
    public function getView($id) {
        try {
            $cliente = Cliente::find($id);
            $pessoa = $cliente->pessoa;
            return view('cliente.view')->with(compact('cliente', 'pessoa'));
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }

    /**
     * Atualização Cliente
     *
     * @return Response
     */
    public function postUpdate() {
        try {
            $cliente = Cliente::findOrFail(Input::get('pk'));
            $cliente->setAttribute(Input::get('name'), Input::get('value'));
            if (!$cliente->save())
                throw new Exception($cliente->errors()->first());
            return response()->json(array('codigo' => 0, 'mensagem' => 'Atualizado com sucesso!'));
        } catch (Exception $e) {
            return response()->json(array('codigo' => $e->getCode(), 'mensagem' => $e->getMessage()), 400);
        }
    }

    /**
     * Exclusão de Cliente
     *
     * @param  int  $id
     * @return Response
     */
    public function getDelete($id) {
        try {
            Cliente::destroy($id);
            return redirect()->back()->with('alert', 'Cliente excluido com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }

}
