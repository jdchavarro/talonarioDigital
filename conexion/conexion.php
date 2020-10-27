<?php
$server = "localhost";
$user = "root";
$password = "toor";
$db = "talonarioDigital";
//nos conectamos a la base de datos
$enlace = mysqli_connect($server,$user,$password,$db);

//comprobamos que no hubo error de conexión
if(mysqli_connect_error()){
	die("Error de conexión en la base de datos");
}
?>
