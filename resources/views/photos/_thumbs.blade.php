

{{ Form::open(['route' => ['delete_photos_path',$baby->id], 'method' => 'delete']) }}

	@if(\Request::route()->getName() == "all_photos_path")
		<div>
			<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button> 
		</div>

		<p>
			<b>Total:</b> {{ $photos->total() }}
		</p>
	@endif
	
	

	<p>&nbsp;</p>

	<div class="div-all-photos">			
		@foreach ($photos as $p)
			
				<div class="div-photo-thumb">
					<a href="{{ route('show_photo_path',['baby' => $baby->id, 'file' => $p->photo]) }}">
						<img src="{{ route('show_photothumb_path',['baby' => $baby->id, 'file' => $p->photo]) }}" class="img-thumbnail" title="{{ $p->description }}">	
					</a>
						@if(\Request::route()->getName() == "all_photos_path")

							<br>
							
								
								<input type="checkbox" name="photos[]" value="{{ $p->id }}" id="{{ $p->id }}">
							
						@endif
				</div>
		@endforeach
	</div>
{{ Form::close() }}
<div class="text-center">
	@if(\Request::route()->getName() == "all_photos_path")	{{ $photos->links() }}	@endif
</div>
