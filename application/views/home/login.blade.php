<!DOCTYPE html>
<html lang="">
	<head>
		<title>Login</title>
		<meta charset=utf-8>
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="../css/bootstrap-theme.css" rel="stylesheet" media="screen">
		<link href="../css/site.css" rel="stylesheet" media="screen">	
		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.js"></script>
		<script type="text/javascript">
        $(function() {
            $("#username").focus();
        });
    </script>

		</head>
	<body>
		<h1 class="text-center">Sunday Closed</h1>
		<div class="container">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<img src='../img/dagal.jpg' style='display:block; margin:0 auto; padding:5px' width=50%>		
		
		{{ Form::open('/checkauth', 'POST', array('role'=>'form')) }}
		
			<div class="loginwrapper">
		
			<div class="form-group" >
				<input type="text" class="form-control" id="username" placeholder=" Username" name="username">
				<br>
				<input type="password" class="form-control" id="password" placeholder=" Password" name="password">
			</div>
			{{ Form::submit('Login', array('class'=>'btn btn-primary pull-right')) }}
		{{ Form::close() }}
		</div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		</div>
		</body>
</html>