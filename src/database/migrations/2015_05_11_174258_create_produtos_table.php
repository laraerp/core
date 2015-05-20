<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('produtos', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('codigo', 60)->unique();
            $table->string('nome', 120);

            $table->float('valor');

            $table->integer('ncm_id')->nullable()->unsigned();
            $table->foreign('ncm_id')->references('id')->on('pessoas')->onDelete('set null');

            $table->integer('cfop_id')->nullable()->unsigned();
            $table->foreign('cfop_id')->references('id')->on('cfops')->onDelete('set null');

            $table->integer('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id')->on('unidades');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('produtos');
	}

}
