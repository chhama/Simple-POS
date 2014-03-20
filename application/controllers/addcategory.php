<?php 
	class Addcategory_controller extends Base_Controller{
		public $restful=true;

		public function get_index(){

		}

		public function post_index(){
			$category=new Category();
			$category->category_name=Input::get('newCategory');
			$input=Input::all();
			$rules=array(
				'newCategory' => 'required|alpha|min:2',
				);

			$validation=Validator::make($input, $rules);
			if($validation->fails())
			{
				return $validation->errors;
			}
			else {
				if($category->save()){
					return Redirect::to('stockentry');
				}
				else
				{
				echo 'Wrong category entry error';
				}
			}
		}
	}
 ?>