<?php

class UsersController extends BaseController {

	
	public function __construct(){
		$this->beforeFilter('auth', array('except' => array('create', 'store')));
	}
	
	/*public function index(){
		$users = User::all();
		$authUser = Auth::user();

		return View::make('users.index', array('users' => $users, 'authUser' => $authUser));
		
	}*/
	
	public function create(){
		return View::make('users.create');
	}
	
	public function store(){

		
		$validation = Validator::make(Input::all(), User::$rules);
		
		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		

		User::create(array(
            'name' => Input::get('name'),
			'password' => Hash::make(Input::get('password')),
			'email' => Input::get('email'),
			'age' => Input::get('age')
		));
		

		return Redirect::route('sessions.create');


	}
}
