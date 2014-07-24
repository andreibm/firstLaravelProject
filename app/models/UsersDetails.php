<?php

class UsersDetails extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_details';
	protected $fillable = ['first_name','last_name','phone_number', 'address'];
	public function user(){
		
		return $this->belongsTo('User','user_id','id');
		
	}
	

}