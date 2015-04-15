<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('clientes', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('fk_pessoa')->unsigned()->unique();
            $table->foreign('fk_pessoa')->references('id')->on('pessoas');

            $table->string('inscricao_estadual', 100)->nullable();
            $table->string('inscricao_municipal', 100)->nullable();
            $table->boolean('retem_issqn')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('clientes');
    }

}
