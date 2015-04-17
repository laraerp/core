<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
    }

}