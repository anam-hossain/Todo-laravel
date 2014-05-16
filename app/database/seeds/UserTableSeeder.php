<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		Eloquent::unguard();

		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Anam Hossain',
			'username' => 'anam',
			'email'    => 'anam@hotmail.com.au',
			'password' => Hash::make('password'),
		));
	}

}