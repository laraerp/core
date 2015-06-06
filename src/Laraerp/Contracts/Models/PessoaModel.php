<?php namespace Laraerp\Contracts\Models;


interface PessoaModel{

    /**
     * Set identification
     *
     * @param int $id
     * @return \Laraerp\Contracts\Models\ContatoModel
     */
    public function setId($id);

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
     * Get identification
     *
     * @return int
     */
    public function getId();

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

    /**
     * Get Endereços
     *
     * @return \Illuminate\Support\Collection
     */
    public function getEnderecos();

    /**
     * Get Contatos
     *
     * @return \Illuminate\Support\Collection
     */
    public function getContatos();

    /**
     * Get Cliente
     *
     * @return \Laraerp\Contracts\Models\ClienteModel
     */
    public function getCliente();

    /**
     * Get Empresa
     *
     * @return \Laraerp\Contracts\Models\EmpresaModel
     */
    public function getEmpresa();

}