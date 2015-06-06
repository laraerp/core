<?php namespace Laraerp\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Laraerp\Contracts\Models\EmpresaModel;
use Laraerp\Contracts\Models\PessoaModel;
use Laraerp\Ordination\OrdinationTrait;
use Laraerp\TagTrait;


class EmpresaEloquentModel extends Model implements EmpresaModel {


    protected $table = 'empresas';

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
     * @return \Laraerp\Contracts\Models\EmpresaModel
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
     * @return \Laraerp\Contracts\Models\EmpresaModel
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
     * @return \Laraerp\Contracts\Models\EmpresaModel
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
     * @return \Laraerp\Contracts\Models\EmpresaModel
     */
    public function setInscricaoMunicipal($inscricao_municipal)
    {
        $this->inscricao_municipal = $inscricao_municipal;

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
}
