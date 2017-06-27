@extends('index')

@section('content')
	<h2>Editar Bebé</h2>



	<div class="form-group">
		{{ Form::model($baby, ['route' => ['update_baby_path', $baby->id]]) }}    		  		
    		{{ Form::text('name',null,['class' => 'form-control']) }}
    		{{ Form::text('city',null,['class' => 'form-control']) }}
    		{{ Form::text('birthdate',null,['class' => 'form-control']) }}
    		{{ Form::select('genre', ['male' => 'male', 'female' => 'female'],null,['class' => 'form-control']) }}
    		{{ Form::submit('Guardar',['class' => 'btn btn-primary']) }}
		{{ Form::close() }}
	</div>	
@endsection