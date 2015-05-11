<?php

namespace Laraerp\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use JansenFelipe\Utils\Utils;
use Laraerp\Cliente;
use Laraerp\Contato;
use Laraerp\Endereco;
use Laraerp\Pessoa;
use Laraerp\Produto;

class ProdutoController extends MainController {

    protected $produto;
    protected $request;

    public function __construct(Produto $produto, Request $request){
        $this->produto = $produto;
        $this->request = $request;
    }

    /**
     * Lista de produtos
     *
     * @return Response
     */
    public function index() {

        /*
         * Order
         */
        $order = $this->request->get('order', 'ASC');
        $by = $this->request->get('by', 'nome');

        $builder = $this->produto->orderBy($by, $order)->select('produtos.*');


        /*
         * Filtrar LIKE
         */
        if($this->request->get('like')){

            $builder = $builder
                ->where('codigo', 'like', '%' . $this->request->get('like') . '%')
                ->orWhere('nome', 'like', '%' . $this->request->get('like') . '%');

        }

        /*
         * Paginate
         */
        $produtos = $builder->paginate($this->request->get('limit', 15));

        return view('produto.index', compact('produtos'));
    }

    /**
     * Exibe formulário para criação de cliente
     *
     * @return Response
     */
    public function form() {
        return view('cliente.form');
    }

    /**
     * Cadastra um cliente
     *
     * @return Response
     */
    public function cadastrar() {
        try{

            /*
             * Validação
             */
            $this->validate($this->request, [
                'nome' => 'required',
                'documento' => 'required',
            ]);

            /*
             * Verificando se pessoa já existe
             */
            $pessoa = Pessoa::where('documento', Utils::unmask($this->request->get('documento')))->first();

            if(is_null($pessoa))
                $pessoa = new Pessoa();

            $pessoa->setNome($this->request->get('nome'));
            $pessoa->setRazaoApelido($this->request->get('razao_apelido'));
            $pessoa->setDocumento($this->request->get('documento'));
            $pessoa->setNascimentoFundacao($this->request->get('nascimento_fundacao'));

            /*
             * Salvando pessoa
             */
            $pessoa->save();

            /*
             * Verificando se a pessoa já é um cliente
             */
            $cliente = $pessoa->cliente;

            if(is_null($cliente))
                $cliente = new Cliente();

            $cliente->setPessoaId($pessoa->id);
            $cliente->setInscricaoEstadual($this->request->get('inscricao_estatual'));
            $cliente->setInscricaoMunicipal($this->request->get('inscricao_municipal'));
            $cliente->setRetemIssqn($this->request->get('retem_issqn'));

            /*
             * Salvando cliente
             */
            $cliente->save();

            /*
             * Verificando se preencheu algum campo no formulario de endereço
             */
            if($this->request->has('cep') || $this->request->has('logradouro') || $this->request->has('numero') ||
                $this->request->has('complemento') || $this->request->has('bairro') || $this->request->has('cidade_id')){

                $this->validate($this->request, [
                    'cep' => 'required',
                    'logradouro' => 'required',
                    'numero' => 'required',
                    'bairro' => 'required',
                    'cidade_id' => 'required|exists:cidades,id',
                ]);

                $endereco = new Endereco();
                $endereco->setPessoaId($pessoa->id);
                $endereco->setCep($this->request->get('cep'));
                $endereco->setLogradouro($this->request->get('logradouro'));
                $endereco->setNumero($this->request->get('numero'));
                $endereco->setComplemento($this->request->get('complemento'));
                $endereco->setBairro($this->request->get('bairro'));
                $endereco->setCidadeId($this->request->get('cidade_id'));

                /*
                 * Salvando endereco
                 */
                $endereco->save();

            }

            /*
             * Verificando se preencheu algum campo no formulario de contato
             */
            if($this->request->has('responsavel') || $this->request->has('telefone') ||
                $this->request->has('celular') || $this->request->has('email')){

                /*
                 * Se informar email, verificar se o mesmo é valido
                 */
                if($this->request->has('email'))
                    $this->validate($this->request, [
                        'email' => 'email'
                    ]);

                $contato = new Contato();
                $contato->setPessoaId($pessoa->id);
                $contato->setResponsavel($this->request->get('responsavel'));
                $contato->setTelefone($this->request->get('telefone'));
                $contato->setCelular($this->request->get('celular'));
                $contato->setEmail($this->request->get('email'));

                /*
                 * Salvando contato
                 */
                $contato->save();

            }


            return redirect(route('cliente.ver', $cliente->id));

        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }

    /**
     * Visualiza o cadastro do cliente
     *
     * @param  Cliente $cliente
     * @return Response
     */
    public function ver(Cliente $cliente) {
        return view('cliente.ver')->with(compact('cliente'));
    }

    /**
     * Edita o cadastro do cliente
     *
     * @param  Cliente $cliente
     * @return Response
     */
    public function editar(Cliente $cliente) {
        try {

            /*
             * Validação
             */
            $this->validate($this->request, [
                'nome' => 'required',
                'documento' => 'required',
            ]);

            /*
             * Verificando se pessoa já existe
             */
            $pessoa = Pessoa::where('documento', Utils::unmask($this->request->get('documento')))->first();

            if(is_null($pessoa))
                $pessoa = new Pessoa();

            $pessoa->setNome($this->request->get('nome'));
            $pessoa->setRazaoApelido($this->request->get('razao_apelido'));
            $pessoa->setDocumento($this->request->get('documento'));
            $pessoa->setNascimentoFundacao($this->request->get('nascimento_fundacao'));

            /*
             * Salvando pessoa
             */
            $pessoa->save();

            $cliente->setPessoaId($pessoa->id);
            $cliente->setInscricaoEstadual($this->request->get('inscricao_estatual'));
            $cliente->setInscricaoMunicipal($this->request->get('inscricao_municipal'));
            $cliente->setRetemIssqn($this->request->get('retem_issqn'));

            /*
             * Salvando cliente
             */
            $cliente->save();

            return redirect()->back()->with('alert', 'Atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage())->withInput();
        }
    }

    /**
     * Exclusão de Cliente
     *
     * @param  Cliente $cliente
     * @return Response
     */
    public function deletar(Cliente $cliente) {
        try {
            $cliente->delete();
            return redirect()->back()->with('alert', 'Cliente excluido com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('erro', $e->getMessage());
        }
    }

}
