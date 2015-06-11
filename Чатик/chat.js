$(document).on("click",".login", function() {
	var msg = $(this).html() + ": ";
	$("#msg").val(msg);
	$("#msg").focus();
});
$(document).ready(function(){ 
	document.oncontextmenu = function() {return false;};
});
$(document).on("mousedown", ".login" , function(e) {
	if( e.button == 2 ) {
		$("#msg").css({color: "#563d7c"});
		var msg = "["+ $(this).html() + "]: ";
		$("#msg").val(msg);
		$("#msg").focus();
		return false; 
	}
	return true;
});

// AJAX добавление записи
$("#add-record").submit(function() {
	$.ajax({
		url: "add_record.php",
		method: "POST",
		data: {msg: $("#msg").val()},
		dataType: "html",
		success: function(data) {
			$("#msg").val('');
			$("#chatik").html(data);
			chatik.scrollTop = chatik.scrollHeight;
		}
	});
	return false;
});
// Обновление чатика каждые 100 мс:3
var timerChat = setInterval(function() {
	$.ajax({
		url: "add_record.php",
		method: "POST",
		dataType: "html",
		success: function(data) {
			if (chatik.scrollHeight - chatik.scrollTop !== chatik.clientHeight) {
				$("#chatik").html(data);
			} else {
				$("#chatik").html(data);
				chatik.scrollTop = chatik.scrollHeight;
			}
		}
	});
}, 1000);

chatik.scrollTop = chatik.scrollHeight;