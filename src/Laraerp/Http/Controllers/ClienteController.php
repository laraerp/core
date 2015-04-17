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
    public function getIndex() {

        $order = $this->request->get('order', 'ASC');
        $by = $this->request->get('by', 'pessoa.nome');

        if(strpos($by, '.')){
            $explode = explode('.', $by);
            $this->cliente->load([$explode[0] => function($q) use ($explode, $order){
                $q->orderBy($explode[1], $order);
            }]) ;
        }else
            $this->cliente->orderBy($by, $order);

        $clientes = $this->cliente->paginate(15);

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
