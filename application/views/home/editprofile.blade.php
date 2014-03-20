@layout('home.master')

@section('extrajs')
<script type="text/javascript">
	$(function() {
            $("#opdpwdid").focus();
        });
</script>
@endsection

@section('content')

 {{ Form::open('/updateprofile','POST',array('class'=>'validatedform'))}}
 <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
 	
 
<div class="panel panel-default">
<div class="panel-heading">
	Update Password
</div>
	<div class="panel-body">
	<input type='hidden' value=<?php $user=Auth::user(); echo $user->id; ?> name='updateuserid'>
	<input type='hidden' value=<?php echo $user->username ?> name='updateusername'>
{{Form::password('oldpwd',array('placeholder'=>'Old password' ,'id'=>'opdpwdid' ,'class'=>'form-control'))}}
<br>
{{Form::password('updateuserpassword',array('placeholder'=>'New password' ,'id'=>'newpwdid' ,'class'=>'form-control'))}}
<br>
{{Form::password('retypepwd',array('placeholder'=>'Retype password' ,'id'=>'retypeid' ,'class'=>'form-control'))}}
<br>
	{{ Form::submit('Update', array('class'=>'btn btn-primary', 'id'=>'btn_submit')) }}
	</div>
	<div class="panel-footer"></div>
</div>
</div>	

<script type="text/javascript">
		var shortpwd=$('<span style="color:red">Password should be at least 5 characters</span>');
		var mismatchpwd=$('<span style="color:red">Passwords do not match</span>');
		$('#newpwdid').focus(function(){
			shortpwd.remove();
			mismatchpwd.remove();
			$('#btn_submit').removeClass('disabled');
		});

		$('#retypeid').focus(function(){

			mismatchpwd.remove();
			$('#btn_submit').removeClass('disabled');
		});

		$('#newpwdid').blur(function(){
			
			if($('#newpwdid').val().length<5)
			{
				$('#newpwdid').after(shortpwd);
				$('#btn_submit').addClass('disabled');
			}
			
		});

		$('#retypeid').blur(function(){
			if($('#newpwdid').val().localeCompare($('#retypeid').val()))
			{
				$('#retypeid').after(mismatchpwd);
				$('#btn_submit').addClass('disabled');
			}
			
		});

</script>

{{Form::close()}}



<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
	<div class="panel panel-default">
	<div class="panel-heading">
		Current User
	</div>
		<div class="panel-body">
	<ul>
<?php 
	$user=Auth::user();

	echo "<li>User ID : ";
	echo $user->id;
	Session::put('currentid',$user->id);
	Session::put('currentuser',$user->username);
	$currentuser=Session::get('currentuser');
	echo '</li><li>';
	echo "Username : ";
	echo $currentuser.'</li></ul>';
 ?>		</div>
	</div>
</div>

@endsection