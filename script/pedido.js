var numeroMesa;
var nombreProducto;
var cantidad;
var idIngrediente;
var ingre;

//actualizamos el div pedido en curso
$("#inputMesa").keyup(function(){
  var xmlhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xmlhttp = new XMLHttpRequest();
  }else{
    // code for old IE browsers
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      document.getElementById("divPedidoEnCurso").innerHTML = this.responseText;
    }
  };
  numeroMesa = document.getElementById("inputMesa").value;
  var url = "mostrarPedidoEnCurso.php?mesa="+numeroMesa;
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
});
//mostrar el div de los productos
$("#botonMostrarProductos").click(function(){
  $("#divProductosIngredientes").toggleClass("oculto");
});
//al dar click en un producto mostramos los ingredientes
$(".radioProducto").click(function(){
  nombreProducto = this.value;
  cantidad = document.getElementById("inputCantidad").value;
  numeroMesa = document.getElementById("inputMesa").value;
  document.getElementById("divProductos").innerHTML = "Producto: "+nombreProducto+"<br>";
  var url = "mostrarIngredientes.php?producto="+nombreProducto+"&mesa="+numeroMesa+"&cantidad="+cantidad;
  $.ajax(url).done(function(data){
    document.getElementById("divIngredientes").innerHTML = data;
  }).fail(function(){
      alert("Ha ocurrido un error!")
  });
  /*
  //enviamos los datos para mostrar los ingredientes
  var xmlhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xmlhttp = new XMLHttpRequest();
  }else{
    // code for old IE browsers
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      ingre = this.responseText;
      var html = $.parseHTML(ingre);
      document.getElementById("divIngredientes").innerHTML = html;
    }
  };
  var url = "mostrarIngredientes.php?producto="+nombreProducto;
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
  */
});
$("#botonEnviarPedido").click(function(){
  numeroMesa = document.getElementById("inputMesa").value;
  var url = "guardarPedido.php?mesa="+numeroMesa;
  $.ajax(url).done(function(data){
    location.href='pedido.php';
  }).fail(function(){
      alert("Ha ocurrido un error al enviar el pedido!")
  });
});
