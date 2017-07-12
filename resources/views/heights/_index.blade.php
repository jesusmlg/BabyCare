{{ Form::model($height, ['route' => ['create_height_path', $baby->id ]])  }}
		<div class="form-inline">
			{{ Form::label('Date:', null, ['class' => 'control-label']) }}
			{{ Form::text('date',null,['class' => 'form-control', 'placeholder' => 'Date']) }}

			{{ Form::label('Height:', null, ['class' => 'control-label']) }}
			{{ Form::text('height', null, ['class' => 'form-control', 'placeholder' => 'Height']) }}

			{{ Form::hidden('baby_id',$baby->id) }}

			{{ Form::submit('Add',['class' => 'btn btn-primary']) }}
			 <a href="{{ route('all_heights_path',['baby' => $baby->id]) }}" class="btn btn-info">Show List</a>
		</div>


		
{{ Form::close() }}

<div id="heights_graphic"></div>

@areachart('BabyHeights', 'heights_graphic') 
