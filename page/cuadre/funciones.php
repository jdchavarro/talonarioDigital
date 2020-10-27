<?php
function nombreProducto($idProducto){
    include("../../conexion/conexion.php");
    $query = "SELECT * FROM productos WHERE id='".$idProducto."'";
    $result = mysqli_query($enlace, $query);
    $row = mysqli_fetch_array($result);
    return $row['nombre'];
}
function nombreIngrediente($idIngrediente){
    include("../../conexion/conexion.php");
	if($idIngrediente > 0){
		$query = "SELECT * FROM ingredientes WHERE id='".$idIngrediente."'";
		$result = mysqli_query($enlace, $query);
		$row = mysqli_fetch_array($result);
		return $row['ingrediente'];
	}else{
		return "-";
	}    
}
?>