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
<?php include("../style/headerCaja.php"); ?>
<link rel="stylesheet" type="text/css" href="../style/caja.css">

<div class="container">
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <a class="navbar-brand" href="#">Aquí es Albeiro - Caja</a>
    <ul class="navbar-nav mr_auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php?Logout=1"><button class="btn btn-outline-danger">Cerrar Sesion</button></a>
      </li>
    </ul>
  </nav>
</div>

<?php include("../style/footer.php"); ?>
