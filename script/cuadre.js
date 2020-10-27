// JavaScript Document
//split("aqui va el separador"); con esto cortamos un string y volvemos un arreglo
function mostrarProductosFacturados(fechaInicio, fechaFin){
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
            document.getElementById("divProductosFacturados").innerHTML = this.responseText;
        }
    };
    var url = "mostrarProductosFacturados.php?inicio="+fechaInicio+"&fin="+fechaFin;
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
};
$("#inicio-input").change(function(){
    var valorInicio = document.getElementById("inicio-input").value;
    var valorFin = document.getElementById("fin-input").value;
    if(valorInicio && valorFin){
       mostrarProductosFacturados(valorInicio, valorFin);
    }
});
$("#fin-input").change(function(){
    var valorInicio = document.getElementById("inicio-input").value;
    var valorFin = document.getElementById("fin-input").value;
    if(valorInicio && valorFin){
        mostrarProductosFacturados(valorInicio, valorFin);
    }
});