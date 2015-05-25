<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;
use Laraerp\Cliente;
use Laraerp\Venda;
use Laraerp\VendaItem;

class VendaItemController extends MainController {


    public function __construct(Request $request){
        $this->request = $request;
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
