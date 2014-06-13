<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChuequesxcuentasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chuequesxcuentas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('numero');
			$table->integer('cuenta');
			$table->decimal('monto',4,2);
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
		Schema::drop('chuequesxcuentas');
	}

}
