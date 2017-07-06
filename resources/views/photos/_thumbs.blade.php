
@foreach ($photos as $p)
	
		<div class="div-photo-thumb">
			<a href="{{ route('show_photo_path',['baby' => $baby->id, 'file' => $p->photo]) }}">
				<img src="{{ route('show_photothumb_path',['baby' => $baby->id, 'file' => $p->photo]) }}" class="img-photo-thumb">	
			</a>
				@if(\Request::route()->getName() == "all_photos_path")

					<br>
					{{ Form::open(['route' => ['delete_photo_path',$baby->id, $p->id], 'method' => 'delete']) }}
						<button type="submit" class="glyphicon glyphicon-remove" onclick="return confirm('Are you sure?')"></button> 
					{{ Form::close() }}
				@endif
		</div>
@endforeach