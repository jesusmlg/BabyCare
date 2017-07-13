$(document).ready(function(){
	$('#add-ajax').click(function(){
		var name = $('#vaccine-name').val();
		var date = $('#vaccine-date').val();
		var baby_id = $('#vaccine-baby-id').val();
		var token = $('#vaccine-token').val();
		var myurl = "{{ route('create_vaccine_path') }}"
		//alert(name + ' - ' + date);

		$.ajax({
			url:'/vaccine/'+baby_id+'/create',
			//url: myurl,
			method: "post",
			dataType: 'json',
			data:{'name':name ,'due_date':date ,'baby_id': baby_id, '_token': token},
			success: function(data)
			{
				alert('ok '+data.name);
				$('div-vaccines').fadeOut();
					  $('div-vaccines').load(url, function() {
					      $('div-vaccines').fadeIn();
					  });
			},
			error: function(data)
			{
				alert('error');
			},
			complete:function(data)
			{
				alert('finish');
			}
		});
	});
});