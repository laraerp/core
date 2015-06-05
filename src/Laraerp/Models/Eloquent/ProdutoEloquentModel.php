<?php namespace Laraerp\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Laraerp\Contracts\Models\ProdutoModel;
use Laraerp\Contracts\Models\UnidadeModel;
use Laraerp\Ordination\OrdinationTrait;

class ProdutoEloquentModel extends Model implements ProdutoModel {

    use OrdinationTrait;

    protected $table = 'produtos';

    /**
     * Belongs to Unidade
     */
    public function unidade() {
        return $this->belongsTo('Laraerp\Models\Eloquent\UnidadeEloquentModel', 'unidade_id', 'id');
    }


    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set Código
     *
     * @param string $codigo
     * @return \Laraerp\Contracts\Models\ProdutoModel
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
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Set Unidade do produto (Massa, Volume..)
     *
     * @param \Laraerp\Contracts\Models\UnidadeModel $unidade
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function setUnidade(UnidadeModel $unidade)
    {
        $this->unidade_id = $unidade->getId();

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
     * Get Código
     *a
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
     * Get Unidade do produto (Massa, Volume..)
     *
     * @return \Laraerp\Contracts\Models\UnidadeModel
     */
    public function getUnidade()
    {
        return $this->unidade;
    }
}
