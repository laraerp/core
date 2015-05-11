<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Laraerp\Cidade;
use Laraerp\Cliente;
use Laraerp\Contato;
use Laraerp\Endereco;
use Laraerp\Pessoa;
use Laraerp\Produto;

class InitSeeder extends Seeder {


    /**
     *
     */
    public function run()
    {
        Model::unguard();

        /*
         * Limpando tabelas
         */
        DB::table('clientes')->delete();
        DB::table('pessoas')->delete();

        /*
         * Criando Clientes
         */
        $pessoa01 = Pessoa::create(['nome' => 'Teste 01', 'documento' => '94177648531']);
        Cliente::create(['pessoa_id' => $pessoa01->id]);

        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 02', 'documento' => '78564045230'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 03', 'documento' => '93913064621'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 04', 'documento' => '65868138597'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 05', 'documento' => '17395765435'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 06', 'razao_apelido' => 'Teste Zero Seis LTDA', 'documento' => '70243118000126'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 07', 'razao_apelido' => 'Teste Zero Sete LTDA', 'documento' => '77646177000194'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 08', 'razao_apelido' => 'Teste Zero Oito LTDA', 'documento' => '42156536000140'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 09', 'razao_apelido' => 'Teste Zero Nove LTDA', 'documento' => '33474718000179'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 10', 'razao_apelido' => 'Teste Zero Dez LTDA',  'documento' => '43759234000120'])->id]);

        /*
         * Criando um endereço para a Pessoa01
         */
        $cidade = Cidade::where('nome', 'BELO HORIZONTE')->first();

        Endereco::create([
            'pessoa_id' => $pessoa01->id,
            'cep' => '31030080',
            'logradouro' => 'Rua Alabastro',
            'numero' => 195,
            'bairro' => 'Sagrada Familia',
            'cidade_id' => $cidade->id
        ]);

        /*
         * Criando um contato para a Pessoa01
         */
        Contato::create([
            'pessoa_id' => $pessoa01->id,
            'responsavel' => 'Contato 01',
            'telefone' => '9988009090',
            'celular' => '11970708080',
            'email' => 'teste@teste.com'
        ]);

        /*
         * Criando um Produto
         */
        Produto::create([
            'codigo' => 'COD0001',
            'nome' => 'Produto 01',
            'valor' => 10
        ]);
    }

}