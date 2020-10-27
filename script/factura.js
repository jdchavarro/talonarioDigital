$("#inputMesa").keyup(function  (){
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
      document.getElementById("divPedidoPorFacturar").innerHTML = this.responseText;
    }
  };
  var numeroMesa = document.getElementById("inputMesa").value;
  var url = "mostrarPedidoPorFacturar.php?mesa="+numeroMesa;
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
});
$("#botonImprimir").click(function(){
  var numeroMesa = document.getElementById("inputMesa").value;
  var url = "imprimirFactura.php?mesa="+numeroMesa;
  //window.location.replace(url);
  var a = document.createElement("a");
  a.target = "_blank";
  a.href = url;
  a.click();
});
