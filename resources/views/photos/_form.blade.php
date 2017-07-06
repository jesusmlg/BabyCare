{{ Form::model($photo,['route' =>['create_photo_path' , $baby->id], 'files' => true] ) }}
	<div class="form-group">
		{{ Form::label('Description:', null, ['class' => 'control-label']) }}
		{{ Form::text('description', null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('Date:', null, ['class' => 'control-label']) }}
		{{ Form::text('date', null, ['class' => 'form-control']) }}
	</div>

	
	

	<label class="btn btn-default btn-file" for="photo">
    <input type="file"  name="photo[]" id="photo" style="display:none"  onchange="$('#selected-file').html(this.files.length+' files')" multiple="true">
		Select Your Photo
	</label>
	<span class='label label-info' id="selected-file"></span>	

	<div class="form-group">
		{{ Form::hidden('baby_id', $baby->id) }}
	</div>

	<div class="form-group">
		{{ Form::submit('Upload',['class' => 'btn btn-primary'])}}
	</div>
{{ Form::close() }}