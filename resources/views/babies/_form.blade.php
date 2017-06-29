
	{{ Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Name']) }}
	{{ Form::text('city',null,['class' => 'form-control', 'placeholder' => 'City']) }}
	{{ Form::text('birthdate',null,['class' => 'form-control', 'placeholder' => 'Birthdate' ]) }}
	{{ Form::select('genre', ['male' => 'male', 'female' => 'female'],null,['class' => 'form-control', 'placeholder' => 'Genre'  ]) }}
	{{ Form::file('baby_photo') }}
	{{ Form::submit('Guardar',['class' => 'btn btn-primary']) }}

