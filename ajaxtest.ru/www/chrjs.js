// Нормальная кроссбраузерная функция ajax
function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

// Данные
var clients = document.getElementById('clients'),
    typep = document.getElementById('typep'),
    client_op = document.getElementById('client_op');

// AJAX
clients.onchange = function() {
  var xhr = getXmlHttp(),
      data = clients.selectedOptions[0].value,
      url = "/operations.php",
      body = "client=" + encodeURIComponent(data);
  xhr.open("POST", url, true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
  xhr.onreadystatechange = function() {
    console.log(url + ' - ' + xhr.status + ': ' + xhr.statusText)
    console.log(body);
    console.log(xhr.responseText);
    typep.innerHTML = xhr.responseText;
  }
  xhr.send(body);
}

typep.onchange = function() {
  var xhr = getXmlHttp(),
      datatype = typep.selectedOptions[0].value,
      dataclient = clients.selectedOptions[0].value,
      url = "type.php",
      body = "type="+encodeURIComponent(datatype)+"&client="+encodeURIComponent(dataclient);
  xhr.open("POST", url, true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
  xhr.onreadystatechange = function() {
    console.log(url + ' - ' + xhr.status + ': ' + xhr.statusText)
    console.log(body);
    console.log(xhr.responseText);
    client_op.innerHTML = xhr.responseText;
  }
  xhr.send(body);
}