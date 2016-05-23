@extends('main')

@section('title', '| Login')

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<h3 class="article-title">Login Form</h3>

			{!! Form::open() !!}
				
				<div class="form-group">
					{{ Form::label('email', 'Email:') }}
					{{ Form::email('email', null, ['class' => 'form-control']) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('password', "Password:") }}
					{{ Form::password('password', ['class' => 'form-control']) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('remember', "Remember Me") }}
					{{ Form::checkbox('remember') }}
				</div>
				
				<div class="form-group">
					{{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}
				</div>

				<p><a href="{{ url('password/reset') }}">Forgot My Password</a></p>


			{!! Form::close() !!}
			
		</div>
	</div>

@endsection