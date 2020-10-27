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

//verificamos que exista el key mesa y idProducto y que contenga algo
if(array_key_exists("mesa",$_GET) && $_GET['mesa'] && array_key_exists("idProducto",$_GET) && $_GET['idProducto']){
  $mesa = $_GET['mesa'];
  $idProducto = $_GET['idProducto'];
  //variable que guarda todos los ingredientes
  $ingredientes = "";
  //nos conectamos a la base de datos
  include("../conexion/conexion.php");
  //seleccionamos de la base de datos todos los ingredientes
  $query = "SELECT * FROM ingredientes WHERE id_producto=".$idProducto."";
  $result = mysqli_query($enlace, $query);
  //variable de control
  $controlIngredientes = 1;
  while($row = mysqli_fetch_array($result)){
    $ingredientes .= "<td><a href='#'>".$row['ingrediente']." ".$row['precio']."<img class='imgProductos' src='../images/".$row["ingrediente"].".jpg'></a></td>";
    if(($controlIngredientes % 3) == 0){
      $ingredientes .= "</tr><tr>";
    }
    $controlIngredientes++;
  }
}else{
  header("Location: ../index.php?Logout=1");
}
?>
<?php include("../style/headerMesero.php"); ?>
<link rel="stylesheet" type="text/css" href="../style/pedido.css">

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
  <div id="divOrden">
    <h1>

        <?php
        echo "<a href='pedido.php?mesa=".$mesa."'><button class='btn btn-primary' onclick='pedido.php?mesa=".$mesa."'>ATRAS</button></a>";
        ?>
      MESA <?php echo $mesa; ?>
    </h1>
    <hr>
    <p><?php //echo $productosOrdenados ?></p>
  </div>
  <div id="divProductos">
    <h1>Ingredientes</h1>
    <hr>
    <p>
      <table id="tableProductos">
        <tr>
          <?php echo $ingredientes ?>
        </tr>
      </table>
    </p>
  </div>
</div>

<?php include("../style/footer.php"); ?>
