<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendaItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venda_items', function(Blueprint $table)
		{
			$table->increments('id');

            $table->integer('venda_id')->unsigned();
            $table->foreign('venda_id')->references('id')->on('vendas');

            $table->integer('produto_id')->nullable()->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->integer('unidade_medida_id')->unsigned();
            $table->foreign('unidade_medida_id')->references('id')->on('unidade_medidas');

            $table->text('codigo');
            $table->text('descricao');
            $table->float('quantidade')->default(0);
            $table->float('valor_unitario')->default(0);
            $table->float('valor_desconto')->default(0);
            $table->float('valor_acrescimo')->default(0);
            $table->float('valor_total')->default(0);

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
		Schema::drop('venda_items');
	}

}
