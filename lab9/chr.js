$.ajax({
	method: "POST",
	url: "operations.php",
	data: {
		client: $("#client").val()
	},
	success: function(html) {
    	$("#client_info").append("success");
  	}
});