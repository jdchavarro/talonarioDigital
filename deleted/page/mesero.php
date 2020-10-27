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
<?php include("../style/headerMesero.php"); ?>
<link rel="stylesheet" type="text/css" href="../style/mesero.css">

<div id="divNavMesero">
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
    <a class="navbar-brand" href="#">Aquí es Albeiro - Mesero</a>
    <ul class="navbar-nav mr_auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php?Logout=1"><button class="btn btn-outline-danger">Cerrar Sesion</button></a>
      </li>
    </ul>
  </nav>
</div>
<div class="container">


  <br>

  <!-- mesas -->
  <table>
    <?php
    $k = 1;
    $m = 1;
    for ($i=0; $i<4 ; $i++) {
      //cabecera
      echo "<thead><tr>";
      for ($j=0; $j < 5; $j++) {
        if($k == 20){
          echo "<th>DOMICILIO</th>";
          $k++;
        }
        else{
          echo "<th>MESA ".$k."</th>";
          $k++;
        }
      }
      echo "</thead></tr>";
      //cuerpo
      echo "<tbody><tr>";
      for ($j=0; $j < 5; $j++) {
        if($m == 20){
        echo "<td><a href='domicilio.php'><img class='table' src='../images/domicilio.jpg'></a></td>";
          $m++;
        }
        else{
          echo "<td><a href='pedido.php?mesa=".$m."'><img class='table' src='../images/mesa.jpg'></a></td>";
          $m++;
        }
      }
      echo "</tbody></tr>";
    }
    ?>
  </table>
  <br>
</div>

<?php include("../style/footer.php"); ?>
