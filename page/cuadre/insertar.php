<?php
include("../../conexion/conexion.php");
$idProducto = 12;
$ingrediente = array("CHICHARRON"=>"2000","POLLO DESMECHADO"=>"2000","CARNE MOLIDA"=>"2000","CARNE BURGUER"=>"2500","JAMON"=>"1000","MORTADELA"=>"1000","PAPA COCIDA"=>"500","TOMATE"=>"500");
foreach($ingrediente as $i => $i_value) {
    $query = "INSERT INTO ingredientes(id_producto, ingrediente, precio) VALUES('".$idProducto."','".$i."','".$i_value."')";
    mysqli_query($enlace,$query);
}
?>