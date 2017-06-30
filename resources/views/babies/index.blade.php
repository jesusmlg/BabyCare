@extends('index')

@section('content')
	<div></div>
	<h2>Listado de bebés</h2>

	<div id="new_baby_button" style="text-align: right;margin-bottom: 20px;	"><a href="{{ route('new_baby_path') }}" class="btn btn-primary">New Baby </a></div>
	<ul class="list-group">
		@foreach($babies as $baby)
			<div class="div_index_baby">
				<li class="list-group-item">
					<h4><b>{{ $baby->name }}</b></h4>
					<img src="{{ asset('storage/img/babies/'.$baby->baby_photo) }}">
				</li>
				<li class="list-group-item">City: {{ $baby->city }}</li>
				<li class="list-group-item">Genre: {{ $baby->genre }}</li>
				<li class="list-group-item">Birthdate: {{ $baby->birthdate }}</li>
				<li class="list-group-item">Editado: {{ $baby->updated_at }}</li>
				<li class="list-group-item">
					<form method="post" action="{{ route('delete_baby_path',['id' => $baby->id]) }}">
					    {{ csrf_field() }}
					    {{ method_field('DELETE') }}
					    <a href="{{ route('show_baby_path',array('id' => $baby->id)) }}" class="btn btn-info">Show</a>
					    <a href="{{ route('edit_baby_path',['id' => $baby->id]) }}" class="btn btn-primary">Edit</a>
						<button type="submit" class="btn btn-danger">Delete</button>
			    	</form>
				</li>
				<hr>
			</div>
		@endforeach
	</ul>
@endsection