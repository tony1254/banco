<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMovimientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movimientos', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tipo');
			$table->integer('cuenta');
			$table->string('nombres');
			$table->string('apellidos');
			$table->string('dpi');
			$table->date('fech_creo');
			$table->date('fech_finalizo');
			$table->integer('cuenta_recibe');
			$table->integer('user');
			$table->decimal('monto',24,2);
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
		Schema::drop('movimientos');
	}

}
