$('#clients').change(function (){
	$.ajax({
		method: "POST",
		dataType: "html",
		url: "operations.php",
		data: {client: $('#clients :selected').val()},
		success: function(data) {
			$("#typep").html(data);
		}
	});
});


$('#typep').change(function (){
	$.ajax({
		method: "POST",
		dataType: "html",
		url: "type.php",
		data: {
			type: $('#typep :selected').val(),
			client: $('#clients :selected').val()
		},
		success: function(data) {
			$("#client_op").html(data);
		}
	});
});