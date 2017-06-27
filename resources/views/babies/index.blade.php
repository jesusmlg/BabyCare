@extends('index')

@section('content')
	<div></div>
	<h2>Listado de bebés</h2>

	<ul>
		@foreach($babies as $baby)
			<div class="div_index_baby">
				<li><h4><b>{{ $baby->name }}</b></h4></li>
				<li>City: {{ $baby->city }}</li>
				<li>Genre: {{ $baby->genre }}</li>
				<li>Birthdate: {{ $baby->birthdate }}</li>
				<li>Editado: {{ $baby->updated_at }}</li>
				<li><a href="{{ route('edit_baby_path',['id' => $baby->id]) }}" class="btn btn-primary">Edit</a></li>
				<hr>
			</div>
		@endforeach
	</ul>
@endsection