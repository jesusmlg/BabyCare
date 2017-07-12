@extends('index')

@section('content')

	<table class="table table-striped table-bordered">
		<thead class="info">
			<th class="info">Height</th>
			<th class="info">Date</th>			
			<th class="info">Acctions</th>
		</thead>
			@foreach ($heights as $h)
					<tr>
						<td>{{ $h->height }}</td>
						<td>{{ $h->date }}</td>						
						<td>
							{{ Form::open(['route' => ['delete_height_path',$baby->id,$h->id],'method' => 'delete','id' => 'form-height-delete']) }}	
								<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')"><b>x</b></button>
							{{ Form::close() }}
							
						</td>
					</tr>		
			@endforeach
		</tbody>
	</table>	
@endsection