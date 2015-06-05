<?php namespace Laraerp\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Utils;
use Laraerp\Contracts\Models\ProdutoModel;
use Laraerp\Contracts\Models\UnidadeMedidaModel;
use Laraerp\Contracts\Models\VendaItemModel;
use Laraerp\Contracts\Models\VendaModel;

class VendaItemEloquentModel extends Model implements VendaItemModel {

    protected $table = 'venda_items';

    /**
     * Belongs to Venda
     */
    public function venda() {
        return $this->belongsTo('Laraerp\Models\Eloquent\VendaEloquentModel', 'venda_id', 'id');
    }

    /**
     * Belongs to Produto
     */
    public function produto() {
        return $this->belongsTo('Laraerp\Models\Eloquent\ProdutoEloquentModel', 'produto_id', 'id');
    }

    /**
     * Belongs to UnidadeMedida
     */
    public function unidadeMedida() {
        return $this->belongsTo('Laraerp\Models\Eloquent\UnidadeMedidaEloquentModel', 'unidade_medida_id');
    }

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set Venda
     *
     * @param \Laraerp\Contracts\Models\VendaModel $venda
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setVenda(VendaModel $venda)
    {
        $this->venda_id = $venda->getId();

        return $this;
    }

    /**
     * Set Produto
     *
     * @param \Laraerp\Contracts\Models\ProdutoModel $produto
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setProduto(ProdutoModel $produto)
    {
        $this->produto_id = $produto->getId();

        return $this;
    }

    /**
     * Set Unidade de Medida
     *
     * @param \Laraerp\Contracts\Models\UnidadeMedidaModel $unidadeMedida
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setUnidadeMedida(UnidadeMedidaModel $unidadeMedida)
    {
        $this->unidade_medida_id = $unidadeMedida->getId();

        return $this;
    }

    /**
     * Set Código
     *
     * @param string $codigo
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Set Descrição
     *
     * @param string $descricao
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Set Quantidade
     *
     * @param int $quantidade
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Set Valor Unitário
     *
     * @param mixed $valorUnitario
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setValorUnitario($valorUnitario)
    {
        $this->valorUnitario =  Utils::unmoeda($valorUnitario);

        return $this;
    }

    /**
     * Set Valor Desconto
     *
     * @param mixed $valorDesconto
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setValorDesconto($valorDesconto)
    {
        $this->valorDesconto =  Utils::unmoeda($valorDesconto);

        return $this;
    }

    /**
     * Set Valor Acrescimo
     *
     * @param mixed $valorAcrescimo
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setValorAcrescimo($valorAcrescimo)
    {
        $this->valorAcrescimo =  Utils::unmoeda($valorAcrescimo);

        return $this;
    }

    /**
     * Set Valor Total
     *
     * @param mixed $valorTotal
     * @return \Laraerp\Contracts\Models\VendaItemModel
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal =  Utils::unmoeda($valorTotal);

        return $this;
    }

    /**
     * Get identification
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get Venda
     *
     * @return \Laraerp\Contracts\Models\VendaModel
     */
    public function getVenda()
    {
        return $this->venda;
    }

    /**
     * Get Produto
     *
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * Get Unidade de Medida
     *
     * @return \Laraerp\Contracts\Models\UnidadeMedidaModel
     */
    public function getUnidadeMedida()
    {
        return $this->unidadeMedida;
    }

    /**
     * Get Código
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Get Descrição
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Get Quantidade
     *
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Get Valor Unitário
     *
     * @return string
     */
    public function getValorUnitario()
    {
        return Utils::moeda($this->valorUnitario);
    }

    /**
     * Get Valor Desconto
     *
     * @return string
     */
    public function getValorDesconto()
    {
        return Utils::moeda($this->valorDesconto);
    }

    /**
     * Get Valor Acrescimo
     *
     * @return string
     */
    public function getValorAcrescimo()
    {
        return Utils::moeda($this->valorAcrescimo);
    }

    /**
     * Get Valor Total
     *
     * @return string
     */
    public function getValorTotal()
    {
        return Utils::moeda($this->valorTotal);
    }
}
