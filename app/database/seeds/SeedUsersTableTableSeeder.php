<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SeedUsersTableTableSeeder extends Seeder {

	public function run()
	{
	DB::table('users')->truncate();
	
	$users = [
	            [
	                'username' => 'andreibm',
	                'email' => 'andreibm@yahoo.com',
	                'password' => Hash::make('123456789'),
	                'userRole' => 100
	            ],
	            [
	                'username' => 'test',
	                'email' => 'test@test.com',
	                'password' => Hash::make('test'),
	                'userRole' => 100
	            ],
	        ];
	
	   foreach($users as $user){
	        User::create($user);
	   }
		
	}

}