{{ Form::model($vaccine,['route' => ['create_vaccine_path', $baby->id ]]) }}

	<div class="form-inline">	
		{{ Form::label('Name:', null, ['class' => 'control-label' ]) }} 
		{{ Form::text('name', null, ['class' => 'form-control'] ) }}


		{{ Form::label('Due Date:',null, ['class' => 'control-label' ]) }} 
		{{ Form::text('due_date', null, ['class' => 'form-control']) }}	

		{{ Form::hidden('baby_id',$baby->id) }}

		{{ Form::submit('Add',['class' => 'btn btn-primary']) }}	
	</div>
{{ Form::close() }}


@foreach ($vaccines as $v)
<ul>
	<li> {{ $v->name }} left {{ $v->due_date }} <b>{{ $v->getDueDateCarbon()->diffForHumans() }}</b></li>
</ul>
	
@endforeach