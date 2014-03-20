<?php 
	class Updateuser_controller extends Base_Controller{
		public $restful = true;
		public function get_index(){

		}

		public function post_index(){
			// echo Input::get('updateuserpassword').Input::get('updateuserid');
			$input=Input::all();
			$rules=array(
					'updateuserpassword' => 'required|max:50|min:5',
				);
			$validation=Validator::make($input, $rules);

			// if($validation->fails())
			// {
			// 	return $validation->errors;
			// }
			// else {
			$success=DB::table('users')->where('id','=',Input::get('updateuserid'))->update(array('password'=>Hash::make(Input::get('updateuserpassword')),'user_type'=>Input::get('updateUserType')));
			if($success)
			{
				return Redirect::to('manageuser/'.Input::get('updateuserid'))->with('flash_notice','Password successfully changed for '.Input::get('updateusername'));
			}
		// }
			
		}
	}
 ?>