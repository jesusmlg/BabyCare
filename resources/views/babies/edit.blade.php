@extends('index')

@section('content')
	<h2>Editar Bebé</h2>



	<div class="form-group">
		{{ Form::model($baby, ['route' => ['update_baby_path', $baby->id], 'files' => true ]) }}    		  		
    		@include('babies._form')
		{{ Form::close() }}
	</div>	
@endsection