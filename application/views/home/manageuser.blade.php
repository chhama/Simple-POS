@layout('home.master')
@section('extrajs')
<script type="text/javascript">
	window.onload = function() {
  $('#newusername').focus();
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
		{{Form::text('newUserName','',array('placeholder'=>'Username','id'=>'newusername' ,'class'=>'form-control'))}}
		<br>
		{{Form::password('newUserPassword',array('placeholder'=>'Password' ,'id'=>'newuserpwd' ,'class'=>'form-control'))}}
		<br>
		{{Form::password('retypeUserPassword',array('placeholder'=>'Retype Password' ,'id'=>'retypeuserpwd' ,'class'=>'form-control'))}}
		<br>
		User Type
		<select name='newUserType' id='newUserTypeID' class='form-control'>
		<option value='0'>Normal User</option>
		<option value='1'>Administrator</option>
		</select>
		<br>
		{{ Form::submit('Create User', array('class'=>'btn btn-primary pull-right', 'id'=>'btn_adduser')) }}

	
	</div>
	<div class="panel-footer"></div>
</div>
</div>	

<script type="text/javascript">
		var shortpwd=$('<span style="color:red">Password should be at least 5 characters</span>');
		var mismatchpwd=$('<span style="color:red">Passwords do not match</span>');
		var usernameexists=$('<span style="color:red">Username already exists</span>');

		$('#newusername').blur(function(){
			$.ajax({
						type: 'get',
						data: 'check_name='+$(this).val(),
						url: 'checkexists',
						dataType:'json',
						}).done(function(result){
							var isexits = result.original.exits;
							if(isexits){
								$('#newusername').after(usernameexists);
							}
							else{
								$('#newusername').after(usernameexists);
								$('#btn_adduser').addClass('disabled');
							}
						});
						
		});

		$('#newusername').focus(function(){
			usernameexists.remove();
			mismatchpwd.remove();
			shortpwd.remove();
			$('#btn_adduser').removeClass('disabled');

		});

		$('#newuserpwd').focus(function(){
			shortpwd.remove();
			mismatchpwd.remove();
			$('#btn_adduser').removeClass('disabled');
		});

		$('#retypeuserpwd').focus(function(){

			mismatchpwd.remove();
			$('#btn_adduser').removeClass('disabled');
		});

		$('#newuserpwd').blur(function(){
			
			if($('#newuserpwd').val().length<5)
			{
				$('#newuserpwd').after(shortpwd);
				$('#btn_adduser').addClass('disabled');
			}
			
		});

		$('#retypeuserpwd').blur(function(){
			if($('#newuserpwd').val().localeCompare($('#retypeuserpwd').val()))
			{
				$('#retypeuserpwd').after(mismatchpwd);
				$('#btn_adduser').addClass('disabled');
			}
			
		});

</script>
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
     	<td>
     	<a class='btn btn-sm btn-danger pull-right' onClick=\"return confirm('Delete This account?');\" href='".url('deleteuser/'.$order->id)."' >Delete</a></td>
		
    	</tr>"; 
		endforeach; 
		echo "</table>";
		echo $orders->links();
		 ?>
		</div>
		<div class="panel-footer"></div>
	</div>
</div>


		<script type="text/javascript">
			$(".confirm").confirm({
    		

    		},
    		cancel: function(button) {
        	// do something
    		},
    		confirmButton: "Yes I am",
    		cancelButton: "No",
    		post: true
		});
		</script>
@endsection

@section('rightcontent')
<div class="col-xs-22 col-sm-22 col-md-22 col-lg-22">
	<div class="panel panel-default">
	<div class="panel-heading">Edit User</div>
		<div class="panel-body">
			{{Form::open('/changeuserdetails','POST')}}
			{{Form::text('updateUserName','',array('placeholder'=>'Username','id'=>'input' ,'class'=>'form-control', 'disabled'=>'disabled'))}}
			<br>
			{{Form::password('updateUserPassword',array('placeholder'=>'Password' ,'id'=>'input' ,'class'=>'form-control', 'disabled'=>'disabled'))}}
			<br>
			{{ Form::submit('Update', array('class'=>'btn btn-primary pull-right')) }}


			{{Form::close()}}
		</div>
	<div class="panel-footer"></div>
	</div>
</div>
@endsection