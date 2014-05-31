<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePersonasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('dpi');
			$table->string('nombres');
			$table->string('apellidos');
			$table->integer('sexo');
			$table->date('fech_nac');
			$table->string('direccion');
			$table->string('telefono');
			$table->string('profecion');
			$table->string('email');
			$table->string('email_interno')->nullable();
			$table->string('nacionalidad');
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
		Schema::drop('personas');
	}

}
