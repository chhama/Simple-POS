<?php 
	class Createuser_controller extends Base_Controller {
		public $restful = true;

		public function get_index(){

		}

		public function post_index(){
			$user=new User();
			$user->username=Input::get('newUserName');
			$user->password=Hash::make(Input::get('newUserPassword'));
			$user->user_type=Input::get('newUserType');
			if($user->save())
			{
				return Redirect::to('manageuser')->with('flash_notice','New user '.Input::get('newUserName').' successfully created.');
			}
			else
			{
				echo "Error in creating User";
			}
		}
	}
	
 ?>