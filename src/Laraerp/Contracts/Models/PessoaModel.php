<?php namespace Laraerp\Contracts\Models;

use Carbon\Carbon;
use Laraerp\Contracts\Model;

interface PessoaModel extends Model {

    /**
     * Set Nome
     *
     * @param string $nome
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function setNome($nome);

    /**
     * Set Razao Social (PJ) ou Apelido (PF)
     *
     * @param string $razao_apelido
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function setRazaoApelido($razao_apelido);

    /**
     * Set Documento
     *
     * @param string $documento
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function setDocumento($documento);

    /**
     * Set data de Nascimento (PF) ou Fundação (PJ)
     *
     * @param mixed
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function setNascimentoFundacao($nascimento_fundacao);

    /**
     * Get Nome
     *
     * @return string
     */
    public function getNome();

    /**
     * Get Razao Social (PJ) ou Apelido (PF)
     *
     * @return string
     */
    public function getRazaoApelido();

    /**
     * Get Documento
     *
     * @return string
     */
    public function getDocumento();

    /**
     * Get data de Nascimento (PF) ou Fundação (PJ)
     *
     * @return \Carbon\Carbon
     */
    public function getNascimentoFundacao();

}