<?php 

class Checkauth_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		dd('get index here');
	}

	public function post_index()
	{
		$credentials = array('username'=>Input::get('username'), 'password'=>Input::get('password'));
		if (Auth::attempt($credentials))
		{
			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('login');
		}
		
	}

}