<?php
include("../../conexion/conexion.php");
include("funciones.php");

$filaProductos = "";
$sumaTotal = 0;
$cantidad = "";
$producto = "";
$ingrediente = "";
$valor = "";

$query = "SELECT * FROM factura WHERE fecha BETWEEN '".$_GET['inicio']."' AND '".$_GET['fin']."'";
if($result = mysqli_query($enlace,$query)){
	while($row = mysqli_fetch_array($result)){
		$key = $row['producto']."-".$row['ingrediente'];
		$cantidad[$key] = "";
		$producto[$key] = "";
		$ingrediente[$key] = "";
		$valor[$key] = "";
	}
}
$query = "SELECT * FROM factura WHERE fecha BETWEEN '".$_GET['inicio']."' AND '".$_GET['fin']."'";
if($result = mysqli_query($enlace,$query)){
	while($row = mysqli_fetch_array($result)){
		$key = $row['producto']."-".$row['ingrediente'];
		$cantidad[$key] += $row['cantidad'];
		$producto[$key] = $row['producto'];
		$ingrediente[$key] = $row['ingrediente'];
		$valor[$key] = $row['valor'];
	}
}
if($producto){
	foreach($producto as $x => $x_value) {
    $p = nombreProducto($x_value);
	$i = nombreIngrediente($ingrediente[$x]);
	$filaProductos .= "<tr><td>".$cantidad[$x]."</td><td>".$p."</td><td>".$i."</td><td>".$valor[$x]*$cantidad[$x]."</td></tr>";	
	$sumaTotal += $valor[$x]*$cantidad[$x];
	}	
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

  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../style/cuadre.css">

  <title>Talonario Digital</title>
</head>
<body>
  <br>

  <div class="container">
      <table class="table">
          <thead>
              <tr>
                  <th>Cantidad</th>
                  <th>Producto</th>
                  <th>Ingrediente</th>
                  <th>Valor</th>
              </tr>
          </thead>
          <tbody>
              <?php echo $filaProductos ?>
          </tbody>
      </table>
      <h3>Suma Total: <?php echo $sumaTotal ?></h3>
  </div>

  <script src="../../jquery/jquery.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../script/cuadre.js"></script>

</body>
</html>