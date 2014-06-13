<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CuentasxusuariosTableSeeder extends Seeder {

	public function run()
	{

			Cuentasxusuario::create(array('id' => '1','cuenta' => '1','sucursal' => '1',));
			Cuentasxusuario::create(array('id' => '1','cuenta' => '2','sucursal' => '1',));
	}

}