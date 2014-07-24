<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SeedUsersDetailsTableTableSeeder extends Seeder {

	public function run()
	{
	DB::table('users_details')->truncate();
	
	$users_details = [
	            [
	                'user_id' => 1,
	                'first_name' => "Andrei",
	                'last_name' => "Bobaila",
	                'phone_number' => "0745223603",
	                'address' => "asdf asdf asdf"
	            ],
	            
	            [
	            'user_id' => 1,
	            'first_name' => "test",
	            'last_name' => "test",
	            'phone_number' => "1231231231",
	            'address' => "asdf asdf asdf"
	            ],
	        ];
	
	   foreach($users_details as $user){
	        UsersDetails::create($user);
	   }
	}

}