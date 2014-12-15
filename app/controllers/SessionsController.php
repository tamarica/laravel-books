<?php
class SessionsController extends BaseController{

	public function create(){
		
		if(Auth::check()){
			return Redirect::route('books.index');
		}
		else{
		return View::make('sessions.create');
        }
	}
	
	public function store(){


        if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))){

            return Redirect::route('books.index');
		}
		else{
           return Redirect::route('sessions.create');
		}
	}
	
	public function destroy(){
		
		Auth::logout();
		
		return Redirect::to('login');
	}


}