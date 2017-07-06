@extends('index')

@section('content')
	<h2>New photo</h2>			
		@include('photos._form',['baby' => $baby])
@endsection