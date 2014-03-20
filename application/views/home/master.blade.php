<!DOCTYPE html>
<html lang="">
	<head>
		<title>Sunday Closed</title>
		<meta charset=utf-8>
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap CSS -->
		<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="../css/bootstrap-theme.css" rel="stylesheet" media="screen">
		<link href="../css/site.css" rel="stylesheet" media="screen">
		<link href="../css/typeahead.css" rel="stylesheet" media="screen">
		<link href="../css/datepicker.css" rel="stylesheet" media="screen">

		<!-- jQuery -->
		<script src="../js/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../js/bootstrap.js"></script>
		<!-- jQuery Autocomplete -->
		<script src="../js/typeahead.js"></script>
		<!-- Bootstrap Datepicker -->
		<script src="../js/bootstrap-datepicker.js"></script>
		<!-- flot -->
		<script src="../js/jquery.flot.js"></script>
		<!-- confirm -->
		<script src="../js/jquery.confirm.js"></script>
		@yield('extrajs')
	</head>
	<body>
	<nav class="navbar navbar-default" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Sunday Closed</a>
		</div>
	
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
			<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sales <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/">New Sale</a></li>
						
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Stock <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/stockentry">Stock Entry</a></li>
						<li><a href="/stockstatus">Stock Status</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">People <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li role="presentation" class="dropdown-header">Users</li>
						<li><a href="/manageuser">Manage User</a></li>
						<li role="presentation" class="divider"></li>
						<li role="presentation" class="dropdown-header">Customers</li>
						<li><a href="/managecustomer">Manage Customer</a></li>
						<li role="presentation" class="divider"></li>
						<li role="presentation" class="dropdown-header">Suppliers</li>
						<li><a href="/managesupplier">Manage Supplier</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="/salesreport">Sales Report</a></li>
						<li><a href="/saleslist">Sales List</a></li>
						<li><a href="/creditorslist">Creditors List</a></li>
						<li><a href="/debtorslist">Debtors List</a></li>
					</ul>
				</li>
			</ul>
			
			<ul class="nav navbar-nav navbar-right">
			<li>
			<form class="navbar-form navbar-right" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search Item/User">
				</div>
				<!-- <button type="submit" class="btn btn-info ">Search</button> -->
			</form>
			</li>
				<li><a href="/editprofile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
				<li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</nav>
		
		<div class="container"  setMinHeight style="min-height: 586px; margin-bottom:100px">
		<div class="row">
		<h5>
			@yield('headmsg')
		</h5>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				@yield('content')
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 borderRight">
				@yield('rightcontent')
			</div>
		</div>
		</div>
		
		<footer>
			<div class="container">
				@yield('footer')
			</div>
		</footer>
		

	</body>
</html>