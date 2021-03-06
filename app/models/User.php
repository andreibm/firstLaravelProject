<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	protected $attributes = array('userRole' => 100);
	
	protected $fillable = ['username','email','password'];
	
	public function userDetails(){
		
		return $this->hasOne('UsersDetails','user_id','id');
		
	}
	
	public function userRole(){
	
		return $this->hasOne('UsersRoles','user_id','id');
	
	}
}
