<?php
$numeroMesa = $_GET['mesa'];
$pedido = "<table class='table'>
            <thead>
              <tr>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Ingrediente</th>
                <th>Precio Unit</th>
              </tr>
            </thead>
            <tbody>";
include("../../conexion/conexion.php");
$query = "SELECT * FROM pedidoencurso WHERE mesa='".$numeroMesa."'";
//verificamos que hallan pedido en curso
if($result = mysqli_query($enlace, $query)){
  while($row = mysqli_fetch_array($result)){
    //ponemos la cantidad
    $pedido .= "<tr><td>".$row['cantidad']."</td><td>";

    //traemos el nombre del Producto
    $consulta = "SELECT * FROM productos WHERE id='".$row['producto']."'";
    $resultado = mysqli_query($enlace, $consulta);
    $fila = mysqli_fetch_array($resultado);
    $pedido .= $fila['nombre']."</td><td>";

    //traemos el nombre del Ingrediente
    $consulta = "SELECT * FROM ingredientes WHERE id='".$row['ingrediente']."'";
    $resultado = mysqli_query($enlace, $consulta);
    $fila = mysqli_fetch_array($resultado);
    $pedido .= $fila['ingrediente']."</td>";

    //agregamos el precio del producto escogido
    $pedido .= "<td>".$row['precio']."</td></tr>";

  }
  $pedido .= "</tbody></table>";
  echo $pedido;
}else{
  echo "<p>No hay pedidos en curso</p>";
}
?>
