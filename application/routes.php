<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/


Route::controller(Controller::detect());

Route::get('/login',function(){
	return View::make('home.login');

});


Route::get('getitemprice', function(){
	$data = Stock::where("item_name","=",Input::get('add_name'))->first();
	return Response::json($data);
});

Route::get('checkexists', function(){
	$data = User::where("username","=",Input::get('check_name'))->first();
	return Response::json($data);
	//dd($data);
});

Route::get('checkcateg', function(){
	$data = Category::where("category_name","=",Input::get('check_name'))->first();
	return Response::json($data);
	//dd($data);
});

Route::get('checkcust', function(){
	$data = Customer::where("name","=",Input::get('check_name'))->first();
	return Response::json($data);
	//dd($data);
});

Route::get('checksupp', function(){
	$data = Supplier::where("supplier_name","=",Input::get('check_name'))->first();
	return Response::json($data);
	//dd($data);
});

Route::get('itemexists', function(){
	$data = Stock::where("item_name","=",Input::get('check_name'))->first();
	return Response::json($data);
	//dd($data);
});



Route::get('/', array('before'=>'auth', function(){

//Route::get('/', function(){

// 	$data = array(
// 		'greeting' =>'Hello',
// 		'thing'=>'world'
	// );
	return View::make('home.index'); 

	// return View::make('home.index');
	
}));

Route::post('showreport', array('before'=>'auth', function(){
	//dd($_POST['datepickerFrom']);
	return View::make('home.showreport');

}));

Route::get('about', array('before'=>'auth', function()
{
	return View::make('home.about');
}));

Route::get('editprofile', array('before'=>'auth', function(){
	return View::make('home.editprofile');
}));

Route::get('saleslist', array('before'=>'auth', function(){
	if(Auth::user()->user_type==0)
		return View::make('home.index');
	else 
	return View::make('home.saleslist');
}));

Route::get('salesreport', array('before'=>'auth', function(){
	if(Auth::user()->user_type==0)
		return View::make('home.index');
	else 
	return View::make('home.salesreport');
}));

Route::get('deletecust/(:num)',array('before'=>'auth',function($id){
	// dd($id);
	DB::table('customers')->delete($id);
	return View::make('home.managecustomer')->with('flash_notice','Customer ID '.Input::get('id').' successfully deleted.');
}));

Route::get('deleteuser/(:num)',array('before'=>'auth',function($id){
	// dd($id);
	DB::table('users')->delete($id);
	return View::make('home.manageuser')->with('flash_notice','Userid '.Input::get('id').' successfully deleted.');
}));

Route::get('deletesupplier/(:num)',array('before'=>'auth',function($id){
	// dd($id);
	DB::table('suppliers')->delete($id);
	return View::make('home.managesupplier')->with('flash_notice','Supplier ID '.Input::get('id').' successfully deleted.');
}));

Route::get('printmemo/(:num)',array('before'=>'auth',function($id){
	return View::make('home.printmemo')->with(array('id'=>$id));
}));


Route::get('saleslist/(:num)', array('before'=>'auth', function($id){
	
	//$sale=DB::table('sales')->where('created_at','=',$created_at)->first();
	$sale=Sale::find($id);
	// dd($sale);
	return View::make('home.editsales')->with(array('id'=>$id,'cust_name'=>$sale->customer_name,'saledate'=>$sale->created_at));
}));


Route::get('manageuser', array('before'=>'auth', function(){
	if(Auth::user()->user_type==0)
		return View::make('home.index');
	else 
	return View::make('home.manageuser');
}));

Route::get('manageuser/(:num)',array('before'=>'auth',function($id){
	$user=User::find($id);
	return View::make('home.changeuserdetails')->with(array('id'=>$id,'username'=>$user->username));
}));

Route::get('managecustomer', array('before'=>'auth', function(){
	if(Auth::user()->user_type==0)
		return View::make('home.index');
	else 
	return View::make('home.managecustomer');
}));

Route::get('managecustomer/(:num)', array('before'=>'auth', function($id){
	$customer=Customer::find($id);
	return View::make('home.editcustomer')->with(array('id'=>$id,'cust_name'=>$customer->name,'cust_addr'=>$customer->address, 'cust_phone'=>$customer->phone, 'cust_owed'=>$customer->owed));
}));

Route::get('managesupplier', array('before'=>'auth', function(){
	if(Auth::user()->user_type==0)
		return View::make('home.index');
	else 
	return View::make('home.managesupplier');
}));

Route::get('managesupplier/(:num)', array('before'=>'auth', function($id){
	
	$supplier = Supplier::find($id);
	return View::make('home.edit')->with(array('id'=>$id, 'supplier_name'=>$supplier->supplier_name, 'supplier_address'=>$supplier->address, 'supplier_phone'=>$supplier->phone, 'supplier_owed'=>$supplier->credit, 'supplier_id'=>$supplier->id));

}));

Route::get('stockentry',array('before'=>'auth',function(){
	if(Auth::user()->user_type==0)
		return View::make('home.index');
	else 
	return View::make('home.stockentry');
}));


Route::get('debtorslist',array('before'=>'auth',function(){
	if(Auth::user()->user_type==0)
		return View::make('home.index');
	else 
	return View::make('home.debtorslist');
}));

Route::get('debtorslist/(:num)',array('before'=>'auth',function($id){
	$debtor=Supplier::find($id);
	return View::make('home.editdebtorslist')->with(array('id'=>$id,'debtor_name'=>$debtor->supplier_name,'debtor_owed'=>$debtor->credit));
}));

Route::get('creditorslist',array('before'=>'auth',function(){
	if(Auth::user()->user_type==0)
		return View::make('home.index');
	else 
	return View::make('home.creditorslist');
}));

Route::get('creditorslist/(:num)',array('before'=>'auth',function($id){
	$creditor=Customer::find($id);
	return View::make('home.editcreditorslist')->with(array('id'=>$id,'creditor_name'=>$creditor->name,'creditor_owed'=>$creditor->owed));
}));

Route::get('stockstatus',array('before'=>'auth',function(){
	if(Auth::user()->user_type==0)
		return View::make('home.index');
	else 
	return View::make('home.stockstatus');
}));

Route::get('stockstatus/(:num)',array('before'=>'auth',function($id){
	$stock=Stock::find($id);
	return View::make('home.updatestock')->with(array('id'=>$id,'item_name'=>$stock->item_name,'brand_name'=>$stock->brand,'quantity'=>$stock->quantity, 'rate'=>$stock->rate, 'threshold'=>$stock->threshold,'sp'=>$stock->sp));
}));

Route::get('printmemo',array('before'=>'auth',function(){
	return View::make('home.printmemo');
}));

Route::get('logout',function(){
	Auth::logout();
	Session::flush();
	return View::make('home.login');
});
Route::get('dbtest',function()
{
	//$posts=DB::query('select * from users');
	//return $posts[0]->name;
	 // $user =  User::find(1);
	 // $user->password=Hash::make('password');
	
	//$users=User::all();
	return $user;
}
);

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});