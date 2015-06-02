<?php namespace Laraerp\Models\Eloquent;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use JansenFelipe\Utils\Mask;
use JansenFelipe\Utils\Utils;
use Laraerp\Contracts\Models\PessoaModel;

class PessoaEloquentModel extends Model implements PessoaModel {

    protected $table = 'pessoas';

    protected $dates = ['nascimento_fundacao', 'created_at', 'updated_at'];

    /**
     * HasOne to Cliente
     */
    public function cliente() {
        return $this->hasOne('Laraerp\Models\Eloquent\ClienteEloquentModel', 'pessoa_id', 'id');
    }

    /**
     * HasMany to Endereco
     */
    public function enderecos() {
        return $this->hasMany('Laraerp\Models\Eloquent\EnderecoEloquentModel', 'pessoa_id', 'id');
    }
    /**
     * HasMany to Contato
     */
    public function contatos() {
        return $this->hasMany('Laraerp\Models\Eloquent\ContatoEloquentModel', 'pessoa_id', 'id');
    }

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Model
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set Nome
     *
     * @param string $nome
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Set Razao Social (PJ) ou Apelido (PF)
     *
     * @param string $razao_apelido
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function setRazaoApelido($razao_apelido)
    {
        $this->razao_apelido = $razao_apelido;

        return $this;
    }

    /**
     * Set Documento
     *
     * @param string $documento
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function setDocumento($documento)
    {
        $this->documento = Utils::unmask($documento);

        return $this;
    }

    /**
     * Set data de Nascimento (PF) ou Fundação (PJ)
     *
     * @param mixed
     * @return \Laraerp\Contracts\Models\PessoaModel
     */
    public function setNascimentoFundacao($nascimento_fundacao)
    {
        try{
            $this->nascimento_fundacao = Carbon::createFromFormat('d/m/Y', $nascimento_fundacao);
        }catch (Exception $e){
            throw new Exception('Informe a data no formato DD/MM/YYYY');
        }

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
     * Get Nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get Razao Social (PJ) ou Apelido (PF)
     *
     * @return string
     */
    public function getRazaoApelido()
    {
        return $this->razao_apelido;
    }

    /**
     * Get Documento
     *
     * @return string
     */
    public function getDocumento()
    {
        return Utils::mask($this->documento, Mask::DOCUMENTO);
    }

    /**
     * Get data de Nascimento (PF) ou Fundação (PJ)
     *
     * @return \Carbon\Carbon
     */
    public function getNascimentoFundacao()
    {
        return $this->nascimento_fundacao->format('d/m/Y');
    }

    /**
     * Get Endereços
     *
     * @return \Illuminate\Support\Collection
     */
    public function getEnderecos()
    {
        return $this->enderecos;
    }

    /**
     * Get Contatos
     *
     * @return \Illuminate\Support\Collection
     */
    public function getContatos()
    {
        return $this->contatos;
    }
}
