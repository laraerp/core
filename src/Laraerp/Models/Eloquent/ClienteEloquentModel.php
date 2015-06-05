<?php namespace Laraerp\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Laraerp\Contracts\Models\ClienteModel;
use Laraerp\Contracts\Models\PessoaModel;
use Laraerp\Ordination\OrdinationTrait;
use Laraerp\TagTrait;


class ClienteEloquentModel extends Model implements ClienteModel {

    use OrdinationTrait, TagTrait;

    protected $table = 'clientes';

    /**
     * Belongs to Pessoa
     */
    public function pessoa() {
        return $this->belongsTo('Laraerp\Models\Eloquent\PessoaEloquentModel', 'pessoa_id', 'id');
    }

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set Pessoa
     *
     * @param \Laraerp\Contracts\Models\PessoaModel $pessoa
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function setPessoa(PessoaModel $pessoa)
    {
        $this->pessoa_id = $pessoa->getId();

        return $this;
    }

    /**
     * Set Inscriçao estadual
     *
     * @param string $inscricao_estadual
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function setInscricaoEstadual($inscricao_estadual)
    {
        $this->inscricao_estadual = $inscricao_estadual;

        return $this;
    }

    /**
     * Set Inscriçao municipal
     *
     * @param string $inscricao_municipal
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function setInscricaoMunicipal($inscricao_municipal)
    {
        $this->inscricao_municipal = $inscricao_municipal;

        return $this;
    }

    /**
     * Set Retem ISSQN
     *
     * @param boolean $retem_issqn
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function setRetemIssqn($retem_issqn)
    {
        $this->retem_issqn = $retem_issqn;

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
     * Get Pessoa
     *
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * Get Inscriçao estadual
     *
     * @return string
     */
    public function getInscricaoEstadual()
    {
        return $this->inscricao_estadual;
    }

    /**
     * Get Inscriçao municipal
     *
     * @return string
     */
    public function getInscricaoMunicipal()
    {
        return $this->inscricao_municipal;
    }

    /**
     * Get Retem ISSQN
     *
     * @return boolean
     */
    public function getRetemIssqn()
    {
        return $this->retem_issqn;
    }
}
