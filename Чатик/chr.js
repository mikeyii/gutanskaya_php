// AJAX авторизации
$("#login-form").submit(function() {
	$.ajax({
		url: "login.php",
		method: "POST",
		data: { login: $("#login-i").val(), pass: $("#pass-i").val()},
		dataType: "html",
		success: function(data) {
			if (data === "")
				window.location.href = "chat.php";
			$(".error").html(data);
		}
	});
	return false;
});