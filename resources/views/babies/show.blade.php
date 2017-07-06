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

		<li class="list-group-item">

			<b>Vaccines:</b>
				<p>
					@include('vaccines._index',['baby' => $baby ])					
				</p>

		</li>
		<li class="list-group-item">
			<b>Photos:</b>
			<p>
				<a href="{{ route('new_photo_path',['baby' => $baby->id]) }}" class="btn btn-primary">Add Photos</a>
				<a href="{{ route('all_photos_path',['baby' => $baby->id]) }}" class="btn btn-primary">Show All Photos</a>
			</p>
			<div class="latest_photos">
				@include('photos._thumbs',['photos' => $photos])
			</div>
		</li>
	</ul>


@endsection