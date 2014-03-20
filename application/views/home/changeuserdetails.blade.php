@layout('home.master')
@section('extrajs')
<script type="text/javascript">
	window.onload = function() {
  $('#updateuserpassword').focus();
  //document.getElementById("newUserName").focus();
};
</script>
@endsection
@section('headmsg')
	@if(Session::has('flash_notice'))
	<div class="alert alert-success" id="flash_notice">
		{{Session::get('flash_notice')}}

	</div>
@endif
@endsection
@section('content')
	{{ Form::open('/createuser','POST')}}
 <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
 	<div class="panel panel-default">
 		<div class="panel-heading">
Add New User
		</div>
	<div class="panel-body">
		{{Form::text('newUserName','',array('placeholder'=>'Username','id'=>'newUserName' ,'class'=>'form-control','disabled'=>'disabled'))}}
		<br>
		{{Form::password('newUserPassword',array('placeholder'=>'Password' ,'id'=>'input' ,'class'=>'form-control','disabled'=>'disabled'))}}
		<br>
		{{ Form::submit('Create User', array('class'=>'btn btn-primary pull-right','disabled'=>'disabled')) }}
	</div>
	<div class="panel-footer"></div>
</div>
</div>	
{{Form::close()}}
<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
	<div class="panel panel-default">
	<div class="panel-heading">Existing Users</div>
		<div class="panel-body">
		<?php 
		echo "<table class='table table-striped table-hover'>
			<tbody>";
				
			
		$orders=DB::table('users')->paginate(7);
		foreach ($orders->results as $order):
		echo "<tr><td>".$order->username."</td><td>".$order->user_type."</td>
     	<td> <a class='btn btn-sm btn-success pull-right' href='".url('manageuser/'.$order->id)."'>Edit</a></td>
     	<td> <a class='btn btn-sm btn-danger pull-right' onClick=\"return confirm('Delete This account?');\" href='".url('deleteuser/'.$order->id)."' >Delete</a></td>
		
		
    	</tr>"; 
		endforeach; 
		echo "</table>";
		echo $orders->links();
		 ?>
		</div>
		<div class="panel-footer"></div>
	</div>
</div>
@endsection

@section('rightcontent')
<div class="col-xs-22 col-sm-22 col-md-22 col-lg-22">
	<div class="panel panel-default">
	<div class="panel-heading">Edit User</div>
		<div class="panel-body">
			{{Form::open('/updateuser','POST')}}
			<input type='hidden' name='updateuserid' value=<?php echo $id;?>>
			<input type='hidden' name='updateusername' value=<?php echo $username; ?>>
			{{Form::text('newusername',$username,array('placeholder'=>'Username', 'name'=>'newusername','id'=>'input' ,'class'=>'form-control', 'disabled'=>'disabled'))}}
			<br>
			{{Form::password('updateuserpassword',array('placeholder'=>'Update password','name'=>'updateuserpassword' ,'id'=>'updateuserpassword' ,'class'=>'form-control'))}}
			<br>
			{{Form::password('retypeuserpassword',array('placeholder'=>'Retype password','name'=>'retypeuserpassword' ,'id'=>'retypeuserpassword' ,'class'=>'form-control'))}}
			<br>
		User Type
		<select name='updateUserType' id='updateUserTypeID' class='form-control'>
		<option value='0'>Normal User</option>
		<option value='1'>Administrator</option>
		</select>
			<br>
			{{ Form::submit('Update', array('class'=>'btn btn-primary pull-right confirm', 'id'=>'btn_update')) }}
			
<script type="text/javascript">
		var shortpwd=$('<span style="color:red">Password should be at least 5 characters</span>');
		var mismatchpwd=$('<span style="color:red">Passwords do not match</span>');

		

		$('#updateuserpassword').focus(function(){
			shortpwd.remove();
			mismatchpwd.remove();
			$('#btn_update').removeClass('disabled');
		});

		$('#retypeuserpassword').focus(function(){

			mismatchpwd.remove();
			$('#btn_update').removeClass('disabled');
		});

		$('#updateuserpassword').blur(function(){
			
			if($('#updateuserpassword').val().length<5)
			{
				$('#updateuserpassword').after(shortpwd);
				$('#btn_update').addClass('disabled');
			}
			
		});

		$('#retypeuserpassword').blur(function(){
			if($('#updateuserpassword').val().localeCompare($('#retypeuserpassword').val()))
			{
				$('#retypeuserpassword').after(mismatchpwd);
				$('#btn_update').addClass('disabled');
			}
			
		});

</script>
			{{Form::close()}}
		</div>
	<div class="panel-footer">
		
	</div>
	</div>
</div>
@endsection