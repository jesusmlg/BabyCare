@extends('index')

@section('content')
	<h2>Alta de nuevo Bebé</h2>

	<div id="form_new_baby">
		{{ Form::open(['url' => route('create_baby_path')]) }}
    		{{ Form::token() }}
    		Formulario 1
		{{ Form::close() }}
	</div>	

	<div id="form_new_baby_2">
		{{ Form::model($baby) }}
    		
    		Formulario 2
    		{{ Form::date('name', \Carbon\Carbon::now()) }}
		{{ Form::close() }}
	</div>	
@endsection
