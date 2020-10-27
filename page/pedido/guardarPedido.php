<?php
include("../../conexion/conexion.php");
$mesa = $_GET['mesa'];
if($mesa >= 0){
  $query = "SELECT * FROM pedidoencurso WHERE mesa='".$mesa."'";
  $result = mysqli_query($enlace, $query);
  while($row = mysqli_fetch_array($result)){
    $p = $row['producto'];
    $i = $row['ingrediente'];
    $c = $row['cantidad'];
    $v = $row['precio'];
    $consulta = "INSERT INTO pedidopendiente(mesa, producto, ingrediente, cantidad, precio) VALUES('".$mesa."','".$p."','".$i."','".$c."', '".$v."')";
    mysqli_query($enlace,$consulta);
  }
  $query = "DELETE FROM pedidoencurso WHERE mesa='".$mesa."'";
  $result = mysqli_query($enlace, $query);
}
?>
