<?php
include("../../conexion/conexion.php");
$mesa="";
if($_POST){
  $mesa = $_POST['mesa'];
  $producto = $_POST['producto'];
  $ingrediente = $_POST['ingredientesRadios'];
  $cantidad = $_POST['cantidad'];
  $precio = "";
  if($ingrediente){
    //traemos el precio del ingrediente
    $consulta = "SELECT * FROM ingredientes WHERE id='".$ingrediente."'";
    $resultado = mysqli_query($enlace, $consulta);
    $fila = mysqli_fetch_array($resultado);
    $precio = $fila['precio'];
    $query = "INSERT INTO pedidoencurso(mesa, producto, ingrediente, cantidad, precio) VALUES('".$mesa."','".$producto."','".$ingrediente."','".$cantidad."', '".$precio."')";
    mysqli_query($enlace,$query);
  }else{
    //traemos el precio del producto
    $consulta = "SELECT * FROM productos WHERE id='".$producto."'";
    $resultado = mysqli_query($enlace, $consulta);
    $fila = mysqli_fetch_array($resultado);
    $precio = $fila['precio'];
    $query = "INSERT INTO pedidoencurso(mesa, producto, ingrediente, cantidad, precio) VALUES('".$mesa."','".$producto."','".$ingrediente."','".$cantidad."', '".$precio."')";
    mysqli_query($enlace,$query);
  }
}
//variable que guarda la lista de productos a mostrar
$productos = "<tr>";
//variable que guarda los ingredientes a mostrar
$ingredientes = "";
//seleccionamos de la base de datos todos los productos
$query = "SELECT * FROM productos";
$result = mysqli_query($enlace, $query);
//variable de control
$controlProductos = 1;
while($row = mysqli_fetch_array($result)){
  $productos .= "<td>
                  <div class='form-check'>
                    <label class='form-check-label'>
                      <input type='radio' class='form-check-input radioProducto' name='productosRadios' id='producto".$row['id']."' value='".$row['nombre']."'>
                      ".$row['nombre']."<img class='imagenProductos' src='../../images/producto_".$row['id'].".jpg'>
                    </label>
                  </div>
                </td>";
  if(($controlProductos % 4) == 0){
    $productos .= "</tr><tr>";
  }
  $controlProductos++;
}
$productos .= "</tr>";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Julian David Chavarro">
  <meta name="phone" content="3044592992">
  <meta name="description" content="Software Talonario Digital">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../style/pedido.css">

  <title>Talonario Digital</title>
</head>
<body>
  <br>

  <div class="container">
      <!-- mesa -->
      <div class="elementosPedido">
        <label for="inputMesa">Mesa:</label>
        <input type="number" class="form-control" id="inputMesa" placeholder="Numero de Mesa" value="<?php echo $mesa ?>">
      </div>

      <!-- Mostrar Productos
      <div class="elementosPedido">
        <button type="button" class="btn btn-primary" id="botonMostrarProductos">Mostrar Producto</button>
      </div>-->

      <!-- Productos e Ingredientes -->
      <div class="elementosPedido " id="divProductosIngredientes">
        <hr>
        <!-- Cantidad -->
        <label for="inputCantidad">Cantidad:</label>
        <input type="number" class="form-control elementosPedido" id="inputCantidad" placeholder="Cantidad" value="1">
        <!-- Productos -->
        <div id="divProductos" class="elementosPedido">
          <table><?php echo $productos ?></table>
        </div>
        <!-- Ingredientes -->
        <div id="divIngredientes"class="elementosPedido"></div>
        <!-- Boton que cancela todo -->
        <button type="button" class="btn btn-danger" id="botonCancelarPedido" onclick="javascript:location.href='pedido.php'">Cancelar</button>
      </div>

      <hr>
      <p><strong>Pedido en Curso: </strong><button type="button" class="btn btn-primary" id="botonEnviarPedido">Enviar Pedido</button></p>
      <div id="divPedidoEnCurso"></div>

  </div>

  <script src="../../jquery/jquery.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../script/pedido.js"></script>

</body>
</html>
