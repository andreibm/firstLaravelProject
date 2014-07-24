<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SeedUsersRolesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users_roles')->truncate();
		
		$users_roles = [
	            [
	            	'id' => 1,
	                'role_name' => "Administrator",
	                'role_permisions' => ""
	            ],
	            
	            [
	            	'id' => 100,
	                'role_name' => "Client",
	                'role_permisions' => ""
	            ],
	        ];
	
	   foreach($users_roles as $role){
	        UsersRoles::create($role);
	   }
	}

}