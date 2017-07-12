@extends('index')

@section('content')

	<table class="table table-striped table-bordered">
		<thead class="info">
			<th class="info">Weight</th>
			<th class="info">Date</th>			
			<th class="info">Acctions</th>
		</thead>
		<tbody>
			@foreach ($weights as $w)
					<tr>
						<td>{{ $w->weight }}</td>
						<td>{{ $w->date }}</td>						
						<td>
							{{ Form::open(['route' => ['delete_weight_path',$baby->id,$w->id],'method' => 'delete','id' => 'form-weight-delete']) }}	
								<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')"><b>x</b></button>
							{{ Form::close() }}
							
						</td>
					</tr>		
			@endforeach
		</tbody>
	</table>	
@endsection