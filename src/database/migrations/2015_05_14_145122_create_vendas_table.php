<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vendas', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('cliente_id')->nullable()->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->integer('endereco_entrega_id')->nullable()->unsigned();
            $table->foreign('endereco_entrega_id')->references('id')->on('enderecos');

            $table->float('valor_frete');
            $table->float('valor_total');

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
		Schema::drop('vendas');
	}

}
