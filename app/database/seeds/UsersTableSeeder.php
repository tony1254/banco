<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        
		//$faker = Faker::create();
$pass=  Hash::make('admin');
		foreach(range(1, 1) as $index)
		{
			 User::create(array('password' => $pass,'rol' => '0','dpi' => 'admin','email' => 'admin',));
			  User::create(array('password' => $pass,'rol' => '1','dpi' => 'admin','email' => 'cajero',));
 User::create(array('password' => $pass,'rol' => '2','dpi' => 'admin','email' => 'cliente',));
			 //Persona::create(array('dpi' => 'admin',);
Cuentum::create(array('id' => '1','tipo_cuenta' => '0','moneda' => '0','fech_creo' => '7/7/7','cheques'=>'10','monto'=>'100',));
			Cuentum::create(array('id' => '2','tipo_cuenta' => '1','moneda' => '0','fech_creo' => '7/7/7','cheques'=>'0','monto'=>'100',));

 		Cuentasxusuario::create(array('id' => '1','cuenta' => '1','user' => '3',));
			Cuentasxusuario::create(array('id' => '2','cuenta' => '2','user' => '3',));
		}
	}

}