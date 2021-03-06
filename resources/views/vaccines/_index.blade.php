

	<div class="form-inline">	
		{{ Form::model($vaccine,['route' => ['create_vaccine_path', $baby->id ]]) }}
			{{ Form::label('Name:', null, ['class' => 'control-label' ]) }} 
			{{ Form::text('name', null, ['class' => 'form-control','id' => 'vaccine-name'] ) }}


			{{ Form::label('Due Date:',null, ['class' => 'control-label' ]) }} 
			{{ Form::text('due_date', null, ['class' => 'form-control','id' => 'vaccine-date']) }}	

			{{ Form::hidden('baby_id',$baby->id,['id' => 'vaccine-baby-id']) }}

			{{ Form::submit('Add',['class' => 'btn btn-primary', 'id'=>'btn-add-vaccine']) }}	
		{{ Form::close() }}
	</div>


<p>
	<a href="#" id="add-ajax" class="btn btn-warning">Add with Ajax</a>
	<input type="hidden" name="_token" id="vaccine-token" value="{{ csrf_token() }}">
</p>
<table class="table table-striped table-condensed">
	<thead>
		<th>id</th>
		<th>name</th>
		<th>due date</th>
		<th>done date</th>
		<th>acctions</th>
	</thead>
	<tbody>
		@foreach ($vaccines as $v)
				<tr>
					<td>{{ $v->id }}</td>
					<td>{{ $v->name }}</td>
					<td>{{ $v->due_date }}  <i>({{ $v->getDueDateCarbon()->diffForHumans() }})</i></td>
					<td>@if($v->done_date!='1900-01-01') {{ $v->done_date }} @endif</td>
					<td>
						{{ Form::open(['route' => ['delete_vaccine_path',$baby->id,$v->id],'method' => 'delete','class' => 'form-vaccine-delete']) }}	
							<button type="submit" class="btn btn-danger btn-vaccine-delete"><b>x</b></button>
						{{ Form::close() }}
						
					</td>
				</tr>		
		@endforeach
	</tbody>
</table>	
