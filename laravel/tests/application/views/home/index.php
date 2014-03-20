@layout('home.master')

@section('headmsg')
	<div class="pull-left">
		{{ 'Welcome' }}
	</div>
@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Welcome</div>
		<div class="panel-body">
		   Basic panel example
		</div>
		<div class="panel-footer">k</div>
	</div>
@endsection

@section('rightcontent')
	<div class="panel panel-default">
		<div class="panel-body">
		   Basic panel example
		</div>
	</div>
@endsection

@section('footer')
foot
@endsection