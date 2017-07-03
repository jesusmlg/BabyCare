@extends('index')

@section('content')
	<h2>Add a new Weight to your History</h2>
	{{ Form::model($weight, ['route' => ['create_weight_path', $baby->id ]])  }}
		<div class="form-group">
			{{ Form::label('Date:', null, ['class' => 'control-label']) }}
			{{ Form::text('date',null,['class' => 'form-control', 'placeholder' => 'Date']) }}
		</div>

		<div class="form-group">
			{{ Form::label('Weight:', null, ['class' => 'control-label']) }}
			{{ Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Weight']) }}		
		</div>	
		<div class="form-group">
			{{ Form::submit('Save',['class' => 'btn btn-primary']) }}
		</div>		
		
	{{ Form::close() }}

@endsection