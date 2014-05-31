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
			 //Persona::create(array('dpi' => 'admin',);
		}
	}

}