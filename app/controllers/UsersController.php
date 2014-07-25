<?php

use Illuminate\Support\Facades\Auth;
class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$dataUser = Input::only(['username','email','password', 'password_confirmation']);
		$dataUserDetails = Input::only(['first_name','last_name','phone_number', 'address']);
		
		$validatorUser = Validator::make(
				$dataUser,
				[
				'username' => 'required',
				'email' => 'required|email',
				'password' => 'required|min:5|confirmed',
				'password_confirmation'=> 'required|min:5'
				]
		);
		
		if($validatorUser->fails()){
			return Redirect::route('user.create')->withErrors($validatorUser)->withInput();
		}
		$validatorUserDetail = Validator::make(
				$dataUserDetails,
				[
				'first_name' => 'required',
				'last_name' => 'required',
				'phone_number' => 'required|regex:/^0[0-9]{9}$/',
				'address'=> 'required'
				]
		);
		
		if($validatorUserDetail->fails()){
			return Redirect::route('user.create')->withErrors($validatorUserDetail)->withInput();
		}
		
		$newUser = User::create($dataUser);
		if($newUser){
			//$userId=array('user_id' => $newUser->id);
			$userDetails = UsersDetails::create($dataUserDetails);
			//var_dump(User::find($newUser->id));
			if($userDetails){				
				
				$userDetails->user()->associate(User::find($newUser->id));
				$userDetails->save();
				
				Auth::login($newUser);
				return Redirect::route('profile');
			}
		}
		
		return Redirect::route('user.create')->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}
	
	/**
	 * Login method
	 */

	public function login(){
		return View::make('users.login');
	}
	
	public function logout(){
		if(Auth::check()){
		  	Auth::logout();
		}
		return Redirect::route('login');
	}
	
	public function handleLogin(){
		$date = Input::only(['email', 'password']);
		$validator = Validator::make(
				$date,
				[
				'email' => 'required|email|min:8',
				'password' => 'required',
				]
		);
		
		if($validator->fails()){
			return Redirect::route('login')->withErrors($validator)->withInput();
		}
		
		if(Auth::attempt(['email' => $date['email'], 'password' => $date['password']])){
			return Redirect::to('profile');
		}
		
		return Redirect::route('login')->withInput();
	}
	
	public function profile(){
		return View::make('users.profile');
	}
	
	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}