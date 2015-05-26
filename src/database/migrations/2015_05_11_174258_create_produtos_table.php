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

            $table->float('valor_unitario')->default(0);

            $table->integer('unidade_medida_id')->unsigned();
            $table->foreign('unidade_medida_id')->references('id')->on('unidade_medidas');

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
