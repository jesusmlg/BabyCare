$(document).ready(function(){
//$(document).on('ready page:load', function(){


	$(document).on('click','#btn-add-vaccine',function(e){

		e.preventDefault();

		var url = $(this).parent('form').attr('action');
		var baby_id = $('#vaccine-baby-id').val();
		var data = $(this).parent('form').serializeArray();

		
		var mi_baby = {
			'baby' :
			{
				'id' : baby_id
			}
		}		


		$.ajax({
			url: url,			
			method: 'post',
			dataType: 'json',
			data: data,
			success: function(data)
			{				
				
			},
			error: function(data)
			{
				alert('error');
			},
			complete: function(data)
			{
				$('#div-vaccines').fadeOut();
					$('#div-vaccines').load('/baby/'+baby_id,function() {
					    $('#div-vaccines').fadeIn();
				});
			}
		});
	});

	

	$(document).on('click','.btn-vaccine-delete',function(e){
		e.preventDefault();

		var url = $(this).parent('form').attr('action');
		var baby_id = $('#vaccine-baby-id').val();
		var data = $(this).parent('form').serialize();
		data = data+'&baby_id='+baby_id;

		if (!confirm('Are you sure?'))
			return false;

		$.ajax({
			url: url,
			dataType: 'json',
			data: data,
			method: 'DELETE',
			success: function(data){				

				$('#div-vaccines').fadeOut();
					$('#div-vaccines').load('/baby/'+baby_id,function() {
					    $('#div-vaccines').fadeIn();
				});
			},
			error: function(data){
				alert('error');
			}
		});


	})
});