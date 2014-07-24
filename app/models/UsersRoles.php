<?php

class UsersRoles extends \Eloquent {
	protected $table = 'users_roles';
	protected $fillable = ['first_name','last_name','phone', 'address'];
}