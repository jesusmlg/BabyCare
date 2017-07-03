{{ Form::model($weight, ['route' => ['create_weight_path', $baby->id ]])  }}
		<div class="form-inline">
			{{ Form::label('Date:', null, ['class' => 'control-label']) }}
			{{ Form::text('date',null,['class' => 'form-control', 'placeholder' => 'Date']) }}

			{{ Form::label('Weight:', null, ['class' => 'control-label']) }}
			{{ Form::text('weight', null, ['class' => 'form-control', 'placeholder' => 'Weight']) }}

			{{ Form::hidden('baby_id',$baby->id) }}

			{{ Form::submit('Add',['class' => 'btn btn-primary']) }}
		</div>	
		
{{ Form::close() }}

<div id="weights_graphic"></div>

{!! $lava->render('AreaChart', 'BabyWeights', 'weights_graphic') !!}
