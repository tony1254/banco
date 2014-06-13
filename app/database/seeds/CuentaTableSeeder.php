<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CuentaTableSeeder extends Seeder {

	public function run()
	{

			Cuentum::create(array('id' => '1','tipo_cuenta' => '0','moneda' => '0','fech_creo' => '7/7/7','cheques'=>'10','monto'=>'100',));
			Cuentum::create(array('id' => '2','tipo_cuenta' => '1','moneda' => '0','fech_creo' => '7/7/7','cheques'=>'0','monto'=>'100',));

	}

}