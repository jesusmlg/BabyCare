@extends('index')

@section('content')
	<h2>Add a new Height to your History</h2>
	{{ Form::model($height, ['route' => ['create_height_path', $baby->id ]])  }}
		<div class="form-group">
			{{ Form::label('Date:', null, ['class' => 'control-label']) }}
			{{ Form::text('date',null,['class' => 'form-control', 'placeholder' => 'Date']) }}
		</div>

		<div class="form-group">
			{{ Form::label('Height:', null, ['class' => 'control-label']) }}
			{{ Form::text('height', null, ['class' => 'form-control', 'placeholder' => 'Height']) }}		
		</div>	
		<div class="form-group">
			{{ Form::submit('Save',['class' => 'btn btn-primary']) }}
		</div>		
		
	{{ Form::close() }}

@endsection