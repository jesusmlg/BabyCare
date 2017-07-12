{{ Form::model($weight, ['route' => ['create_weight_path', $baby->id ]])  }}
		<div class="form-inline">
			{{ Form::label('Date:', null, ['class' => 'control-label']) }}
			{{ Form::text('date',null,['class' => 'form-control', 'placeholder' => 'Date']) }}

			{{ Form::label('Weight:', null, ['class' => 'control-label']) }}
			{{ Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Weight']) }}

			{{ Form::hidden('baby_id',$baby->id) }}

			{{ Form::submit('Add',['class' => 'btn btn-primary']) }}
			<a href="{{ route('all_weights_path',['baby' => $baby->id]) }}" class="btn btn-info">Show List</a>
		</div>	
		
{{ Form::close() }}

<div id="weights_graphic"></div>

@areachart('BabyWeights', 'weights_graphic') 
