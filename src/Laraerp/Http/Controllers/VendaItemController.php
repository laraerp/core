<?php

namespace Laraerp\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JansenFelipe\Utils\Utils;
use Laraerp\Cliente;
use Laraerp\Produto;
use Laraerp\Unidade;
use Laraerp\Venda;
use Laraerp\VendaItem;
use League\Flysystem\Util;

class VendaItemController extends MainController {

    private $request;
    private $vendaItem;

    public function __construct(VendaItem $vendaItem, Request $request){
        $this->request = $request;
        $this->vendaItem = $vendaItem;
    }

    /**
     * Adicionar um item na Venda
     *
     * @return Response
     */
    public function adicionar(Venda $venda) {
        try {
            DB::beginTransaction();

            $produtos = $this->request->get('produtos');
            $quantidades = $this->request->get('quantidades');
            $unidade_medida = $this->request->get('unidades_medida');
            $valores_unitario = $this->request->get('valores_unitario');

            $descontos = $this->request->get('descontos');
            $acrescimos = $this->request->get('acrescimos');


            /*
             * Adicionando..
             */
            foreach($produtos as $id){
                $quantidade = $quantidades[$id];

                if($quantidade<=0)
                    throw new Exception('Qunatidade não pode ser 0');

                $produto = Produto::find($id);

                $valor = Utils::unmoeda($valores_unitario[$id]);

                $valor_bruto = $quantidade * $valor;

                $desconto = isset($descontos[$id]) ? $descontos[$id] : 0;
                $acrescimo = isset($acrescimos[$id]) ? $acrescimos[$id] : 0;

                $valor_liquido = (($quantidade * $valor) - $desconto + $acrescimo);

                $this->vendaItem->create([
                    'venda_id' => $venda->id,
                    'produto_id' => $produto->id,
                    'unidade_medida_id' => $unidade_medida[$id],
                    'codigo' => $produto->codigo,
                    'descricao' => $produto->nome,
                    'quantidade' => $quantidade,
                    'valor_unitario' => $valor,
                    'valor_bruto' => $valor_bruto,
                    'valor_desconto' => Utils::unmoeda($desconto),
                    'valor_acrescimo' => Utils::unmoeda($acrescimo),
                    'valor_liquido' => $valor_liquido
                ]);

                $venda->valor_bruto += $valor_bruto;
                $venda->valor_desconto += $desconto;
                $venda->valor_acrescimo += $acrescimo;
                $venda->valor_liquido += $valor_liquido;
            }

            $venda->save();

            DB::commit();

            return redirect()->back()->with('alert', 'Itens incluidos com sucesso!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }

    /**
     * Deletar um item da Venda
     *
     * @param  VendaItem $vendaItem
     * @return Response
     */
    public function deletar(VendaItem $vendaItem) {
        try {
            DB::beginTransaction();

            $venda = $vendaItem->venda;

            $venda->valor_bruto -= $vendaItem->valor_unitario;
            $venda->valor_desconto -= $vendaItem->valor_desconto;
            $venda->valor_acrescimo -= $vendaItem->valor_acrescimo;
            $venda->valor_liquido -= $vendaItem->valor_liquido;

            $venda->save();

            $vendaItem->delete();

            DB::commit();

            return redirect()->back()->with('alert', 'Item excluido com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }


}
