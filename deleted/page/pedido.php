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

//verificamos que exista el key mesa y ademas que contenga algo
if(array_key_exists("mesa",$_GET) && $_GET['mesa']){
  $mesa = $_GET['mesa'];
  //variable que guarda los productos ordenados
  $productosOrdenados = "";
  //variable que guarda todos los productos
  $productos = "";
  //nos conectamos a la base de datos
  include("../conexion/conexion.php");
  //seleccionamos de la base de datos todos los productos
  $query = "SELECT * FROM productos";
  $result = mysqli_query($enlace, $query);
  //variable de control
  $controlProductos = 1;
  while($row = mysqli_fetch_array($result)){
    if($row['ingredientes'] == 1){
      $productos .= "<td><a href='ingredientes.php?mesa=".$mesa."&idProducto=".$row['id']."'>".$row['nombre']."<img class='imgProductos' src='../images/".$row["id"].".jpg'></a></td>";
    }else{
      $productos .= "<td><a href='#'>".$row['nombre']."<img class='imgProductos' src='../images/".$row["id"].".jpg'></a></td>";
    }

    if(($controlProductos % 3) == 0){
      $productos .= "</tr><tr>";
    }
    $controlProductos++;
  }


}
else{
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
      <a href="mesero.php">
        <button class="btn btn-primary" onclick="mesero.php">ATRAS</button></a>
      MESA <?php echo $mesa; ?>
    </h1>
    <hr>
    <p><?php echo $productosOrdenados ?></p>
  </div>
  <div id="divProductos">
    <h1>PRODUCTOS</h1>
    <hr>
    <p>
      <table id="tableProductos">
        <tr>
          <?php echo $productos ?>
        </tr>
      </table>
    </p>
  </div>
</div>

<?php include("../style/footer.php"); ?>
