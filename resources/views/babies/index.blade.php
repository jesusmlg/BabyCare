@extends('index')

@section('content')
	<h2>Listado de bebés</h2>

	<ul>
		@foreach($babies as $baby)
			<li>{{ $baby->name }} - {{ $baby->genre }}</li>
		@endforeach
	</ul>
@endsection