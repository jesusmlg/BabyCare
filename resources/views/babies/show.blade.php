@extends('index')

@section('content')
	<ul class="list-group">
		<li class="list-group-item list-group-item-info">
			<h2>{{ $baby->name }}</h2>
		</li>
		<li class="list-group-item">
			<img src="{{ route('show_avatar_path',['file' => $baby->baby_photo])  }}">			
		</li>
	

		<li class="list-group-item">
			<b>City:</b> {{ $baby->city }}
		</li>
		<li class="list-group-item">
			<b>Birdthdate:</b> {{ $baby->birthdate }}
		</li>
		
		<li class="list-group-item list-group-item-info">
			<b>Weights:</b>
		</li>
		<li class="list-group-item">
			<p>
				@include('weights._index',['baby' => $baby ])					
			</p>

		</li>

		<li class="list-group-item list-group-item-info">
			<b>Heights:</b>
		</li>
		<li class="list-group-item">
			<p>
				@include('heights._index',['baby' => $baby ])					
			</p>

		</li>

		<li class="list-group-item list-group-item-info"">
			<b>Vaccines:</b>
		</li>
		<li class="list-group-item">
				<div id="div-vaccines">
					<p>
						@include('vaccines._index',['baby' => $baby ])					
					</p>	
				</div>
				

		</li>
		<li class="list-group-item list-group-item-info">
			<b>Photos:</b>
		</li>
		<li class="list-group-item">
			<p>
				<a href="{{ route('new_photo_path',['baby' => $baby->id]) }}" class="btn btn-primary">Add Photos</a>
				<a href="{{ route('all_photos_path',['baby' => $baby->id]) }}" class="btn btn-info">Show All Photos</a>
			</p>
			<div class="latest_photos text-center">
				
			</div>
		</li>
	</ul>


@endsection