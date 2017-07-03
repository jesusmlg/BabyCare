@extends('index')

@section('content')
	<ul class="list-group">
		<li class="list-group-item">
			<img src="{{ asset('storage/img/babies/'.$baby->baby_photo)  }}">
			<h3>{{ $baby->name }}</h3>
		</li>
	

		<li class="list-group-item">
			<b>City:</b> {{ $baby->city }}
		</li>
		<li class="list-group-item">
			<b>Birdthdate:</b> {{ $baby->birthdate }}
		</li>
		
		<li class="list-group-item">

			<b>Weights:</b>
				<p>
					@include('weights._index',['baby' => $baby ])					
				</p>

		</li>
	</ul>


@endsection