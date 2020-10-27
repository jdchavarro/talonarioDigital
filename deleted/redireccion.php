<?php
session_start();
if(array_key_exists("id",$_COOKIE) && $_COOKIE['id']){
  $_SESSION['id'] = $_COOKIE['id'];
}
if(array_key_exists("id",$_SESSION) && $_SESSION['id']){
  include("conexion/conexion.php");
  $id = mysqli_real_escape_string($enlace, $_SESSION['id']);
  $query = "SELECT rol FROM usuarios WHERE id=".$id." LIMIT 1";
  $result = mysqli_query($enlace, $query);
  $fila = mysqli_fetch_array($result);
  $rol =  $fila['rol'];
  if($rol == 1){
    header("Location: page/caja.php");
  }
  else if($rol == 2){
    header("Location: page/mesero.php");
  }
}
else{
  header("Location: index.php");
}
?>
