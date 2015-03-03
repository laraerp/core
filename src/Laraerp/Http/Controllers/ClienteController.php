<?php

namespace Laraerp\Http\Controllers;

use Laraerp\Cliente;

class ClienteController extends MainController {

    /**
     * Lista de clientes
     *
     * @return Response
     */
    public function getIndex() {
        $clientes = Cliente::paginate(15);
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
