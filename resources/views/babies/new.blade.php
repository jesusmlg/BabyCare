@extends('index')

@section('content')
	<h2>Create Baby</h2>


	<div class="form-group">
		{{ Form::model($baby, ['route' => ['create_baby_path'], 'files' => true ]) }}    		  		
    		@include('babies._form',['baby' => $baby])
		{{ Form::close() }}
	</div>	
@endsection