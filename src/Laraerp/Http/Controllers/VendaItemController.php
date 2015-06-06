<?php

namespace Laraerp\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use JansenFelipe\Utils\Utils;
use Laraerp\Cliente;
use Laraerp\Contracts\Repositories\ProdutoRepository;
use Laraerp\Contracts\Repositories\VendaItemRepository;
use Laraerp\Contracts\Repositories\VendaRepository;
use Laraerp\Http\Requests\VendaItemAdicionarRequest;
use Laraerp\Produto;
use Laraerp\Unidade;
use Laraerp\Venda;
use Laraerp\VendaItem;
use League\Flysystem\Util;

class VendaItemController extends MainController {


    public function __construct(VendaItemRepository $vendaItemRepository, ProdutoRepository $produtoRepository){
        $this->vendaItemRepository = $vendaItemRepository;
        $this->produtoRepository = $produtoRepository;
    }

    /**
     * Adicionar um item na Venda
     *
     * @return Response
     */
    public function adicionar(VendaItemAdicionarRequest $request) {

        $produtos = $request->get('produtos');
        $quantidades = $request->get('quantidades');
        $unidade_medida = $request->get('unidades_medida');
        $valores_unitario = $request->get('valores_unitario');

        $descontos = $request->get('descontos');
        $acrescimos = $request->get('acrescimos');

        foreach($produtos as $idProduto){

            $produto = $this->produtoRepository->getById($idProduto);

            $this->vendaItemRepository->save([
                'venda_id' => $request->get('venda_id'),
                'produto_id' => $produto->getId(),
                'unidade_medida_id' => $unidade_medida[$idProduto],
                'codigo' => $produto->getCodigo(),
                'descricao' => $produto->getDescricao(),
                'quantidade' => $quantidades[$idProduto],
                'valor_unitario' => $valores_unitario[$idProduto],
                'valor_desconto' => $descontos[$idProduto],
                'valor_acrescimo' => $acrescimos[$idProduto]
            ]);
        }

        return redirect(route('venda.ver', $request->get('venda_id')))->with('alert', 'Itens incluidos com sucesso!');
    }

    /**
     * Deletar um item da Venda
     *
     * @param  int $idVendaItem
     * @return Response
     */
    public function deletar($idVendaItem) {
        try {
            $this->vendaItemRepository->remove($idVendaItem);

            return redirect()->back()->with('alert', 'Item excluido com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }


}
