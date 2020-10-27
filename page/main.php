<?php
session_start();
if(array_key_exists("id",$_COOKIE) && $_COOKIE['id']){
  $_SESSION['id'] = $_COOKIE['id'];
}
if(array_key_exists("id",$_SESSION) && $_SESSION['id']){
}
else{
  header("Location: ../index.php");
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

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../style/style.css">

  <title>Talonario Digital</title>
</head>
<body>
  <!-- Cabecera -->
  <div id="divNavCabecera">
    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <a class="navbar-brand" href="#">Aquí es Albeiro</a>
      <ul id="barraPrincipal" class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link"><button id="pedido" class="btn btn-outline-info boton active">PEDIDO</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><button id="factura" class="btn btn-outline-success boton">FACTURA</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><button id="cuadre" class="btn btn-outline-warning boton">CUADRE</button></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php?Logout=1"><button class="btn btn-outline-danger">Cerrar Sesion</button></a>
        </li>
      </ul>
    </nav>
  </div>

  <div class="container">
    <br>

    <iframe id="pedidoPanel" class="panel" src="pedido/pedido.php"></iframe>
    <iframe id="facturaPanel" class="panel oculto" src="factura/factura.php"></iframe>
    <iframe id="cuadrePanel" class="panel oculto" src="cuadre/cuadre.php"></iframe>

    <br>
  </div>

  <script src="../jquery/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../script/script.js"></script>

</body>
</html>
