<?php namespace Laraerp\Repositories\Eloquent;

use Laraerp\Contracts\Criteria;
use Laraerp\Contracts\Models\ClienteModel;
use Laraerp\Contracts\Models\ProdutoModel;
use Laraerp\Contracts\Repositories\ProdutoRepository;
use Laraerp\Contracts\Repositories\UnidadeRepository;
use Laraerp\Ordination\OrdinationTrait;

class ProdutoEloquentRepository implements ProdutoRepository{

    use OrdinationTrait;

    /**
     * Constructor
     *
     * @param ClienteModel $cliente
     */
    function __construct(ProdutoModel $produto, UnidadeRepository $unidadeRepository)
    {
        $this->produto = $produto;
        $this->unidadeRepository = $unidadeRepository;
    }


    /**
     * Aplica condição $like no campo Nome do produto
     *
     * @param null $like
     * @return \Laraerp\Contracts\Repositories\ProdutoRepository
     */
    public function whereLike($like = null)
    {
        if(!is_null($like)){

            $this->produto = $this->produto->where(function ($query) use ($like) {
                $query->where('codigo', 'like', '%' . $like . '%');
                $query->orWhere('descricao', 'like', '%' . $like . '%');
            });
        }

        return $this;
    }

    /**
     * Retorna uma coleção de Produtos com paginação
     *
     * @param null $limit
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($limit = null, array $columns = array('*'))
    {
        return $this->produto->select('produtos.*')->paginate($limit, $columns);
    }

    /**
     * Retorna registros do repositório
     *
     * @return \Illuminate\Support\Collection
     */
    public function all($like = null)
    {
        return $this->produto->get();
    }

    /**
     * Aplica ordenação
     *
     * @param null $by
     * @param null $order
     * @return \Laraerp\Contracts\Repositories\ProdutoRepository
     */
    public function order($by = null, $order = null)
    {
        if(!is_null($by))
            $this->produto = $this->produto->orderBy($by, $order);

        return $this;
    }

    /**
     * Retorna um Produto
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function getById($id)
    {
        return $this->produto->find($id);
    }


    /**
     * Salva um Produto no repositório
     *
     * @param array $params
     * @return \Laraerp\Contracts\Models\ProdutoModel
     */
    public function save(array $params)
    {
        if(isset($params['id']) && $params['id']>0)
            $this->produto = $this->getById($params['id']);

        $this->produto->setCodigo($params['codigo']);
        $this->produto->setDescricao($params['descricao']);
        $this->produto->setUnidade($this->unidadeRepository->getById($params['unidade_id']));

        /*
         * Salvando
         */
        $this->produto->save();

        return $this->produto;
    }

    /**
     * Remove Produto do repositorio
     *
     * @param int $id
     * @return boolean
     */
    public function remove($id)
    {
        return $this->getById($id)->delete();
    }
}