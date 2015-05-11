<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Laraerp\User;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /*
         * Limpando tabelas
         */
        DB::table('users')->delete();

        /*
         * Criando usuarios
         */
        User::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => Hash::make('admin')]);

        /*
         * Cidades
         */
        $this->call('CidadesSeeder');

        /*
         * NCMs
         */
        $this->call('NcmsSeeder');

        /*
         * CFOPs
         */
        $this->call('CfopsSeeder');

        /*
         * Unidades de Medida
         */
        $this->call('UnidadeMedidasSeeder');
    }

}