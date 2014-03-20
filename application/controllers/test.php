<?php 

class Test_Controller extends Base_Controller {

	public $restful = true;

	public function get_index()
	{
		return View::make('test');
	}

	public function get_me1()
	{
		dd('me1');
	}
}