<?php 
	class Updateprofile_controller extends Base_Controller{
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
			$success=DB::table('users')->where('id','=',Input::get('updateuserid'))->update(array('password'=>Hash::make(Input::get('updateuserpassword'))));
			if($success)
			{
				return Redirect::to('editprofile/')->with('flash_notice','Password successfully changed for '.Input::get('updateusername'));
			}
		// }
			
		}
	}
 ?>