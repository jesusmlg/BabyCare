@extends('index')

@section('content')
	<div style="margin-top: 70px;"></div>
	<h2>Listado de bebés</h2>

	<ul>
		@foreach($babies as $baby)
			<div class="div_index_baby">
				{{ $baby->name }}
			</div>
		@endforeach
	</ul>
@endsection