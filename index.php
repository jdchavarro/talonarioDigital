<?php
session_start();
//verificamos si el usuario viene cerrando sesion de otra pagina
if(array_key_exists("Logout",$_GET)){
  //viene de otra pagina para cerrar sesion
  //cerramos todas las variable de sesion
  session_unset();
  //eliminamos la cookie
  setcookie("id","",time()-60*60);
  $_COOKIE['id'] = "";
}
else if((array_key_exists("id",$_SESSION) AND $_SESSION['id']) OR (array_key_exists("id",$_COOKIE) AND $_COOKIE['id'])){
  header("Location: page/main.php");
}

//creamos la variable que ira recogiendo los errores
$error = "";
//verificamos que halla enviado algo
if(array_key_exists("submit",$_POST)){
  include("conexion/conexion.php");

  //verificar si los campos estan vacios
  if(!$_POST['username']){
    $error .= "<br><strong>Nombre de Usuario</strong> requerido.";
  }
  if(!$_POST['password']){
    $error .= "<br><strong>Contraseña</strong> requerida.";
  }
  else{
    //evitamos sql injection
    $username = mysqli_real_escape_string($enlace, $_POST['username']);
    $password = mysqli_real_escape_string($enlace, $_POST['password']);

    //seleccionamos de la base de datos el usuario ingresado
    $query = "SELECT * FROM usuarios WHERE username='".$username."'";
    $result = mysqli_query($enlace, $query);
    $fila = mysqli_fetch_array($result);
    if(isset($fila)){
      if($password == $fila['password']){
        //usuario autenticado
        $_SESSION['id'] = $fila['id'];
        setcookie("id",$fila['id'],time()+60*60*10);
        header("Location: page/main.php");
      }
      else{
        $error = "<p>La <strong>contraseña</strong> no es correcta</p>";
      }
    }
    else{
      $error = "<p>El <strong>usuario</strong> no esta registrado</p>";
    }
  }
}

//mostramos los errores encontrados
if($error != ""){
  $error = "<p>Hubo algun(os) error(es) en el formulario: ".$error."</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Julian David Chavarro">
  <meta name="phone" content="3044592992">
  <meta name="description" content="Software Talonario Digital">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <style>
  html {
    background: url(images/bg.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  body{
    background: none;
  }
  .container{
    text-align: center;
    width: 400px;
    color: #FFFFFF;
  }
  #divContainer{
    margin-top: 150px;
  }
  </style>

  <title>Talonario Digital</title>
</head>
<body>
  <div class="container" id="divContainer">
    <div id="divNombreLogin">
      <h1>Aquí es Albeiro</h1>
      <h3>Piqueteadero</h3>
    </div>

    <!-- Seccion Errores -->
    <div id="error">
      <?php
      if($error != ""){
          echo "<div class='alert alert-danger' role='alert'>".$error."</div>";
      }
      ?>
    </div>

    <!-- Formulario login -->
  	<form method="POST" id="formularioLogin">
  		<p>Inicia sesión con tu usuario/contraseña</p>
  		<div class="form-group">
  			<input type="text" class="form-control" name="username" placeholder="Nombre de Usuario">
  		</div>
  		<div class="form-group">
  			<input type="password" class="form-control" name="password" placeholder="Contraseña">
  		</div>
  		<div class="form-group">
  			<input type="submit" class="btn btn-success" name="submit" value="Inicia sesión">
  		</div>
  	</form>

  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
