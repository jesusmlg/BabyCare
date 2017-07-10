@extends('index')

@section('content')
	<h2>Photo Album</h2>
	<p>
		<a href="{{ route('new_photo_path',['baby' => $baby->id]) }}" class="btn btn-primary">Add New Photo</a>
	</p>
	@include('photos._thumbs')
@endsection