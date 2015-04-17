<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Laraerp\Cliente;

class InitSeeder extends Seeder {


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
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 01', 'documento' => '94177648531'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 02', 'documento' => '785.640.452-30'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 03', 'documento' => '939.130.646-21'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 04', 'documento' => '658.681.385-97'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 05', 'documento' => '173.957.654-35'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 06', 'documento' => '94177648531'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 07', 'documento' => '94177648531'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 08', 'documento' => '94177648531'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 09', 'documento' => '94177648531'])->id]);
        Cliente::create(['pessoa_id' => Pessoa::create(['nome' => 'Teste 10', 'documento' => '94177648531'])->id]);
    }

}