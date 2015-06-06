<?php

use Carbon\Carbon;
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

            $table->date('data')->default(Carbon::now());

            $table->date('data_entrega')->nullable();

            $table->float('valor_frete')->default(0);
            $table->float('valor_total')->default(0);
            $table->float('valor_pago')->default(0);

            $table->text('observacoes')->nullable();

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
