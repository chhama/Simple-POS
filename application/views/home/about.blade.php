@layout('home.master')
<?php 
	if(Auth::check())
		echo "okkkk";
	else
		echo "abd";
 ?>
@section('content')
About
@endsection