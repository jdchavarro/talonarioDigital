<?php
$mesa = $_GET['mesa'];
$numeroFactura = "";
$pedido = "";
$sumaTotal = "";
function obtenerFecha(){
    $hoy = getdate();
    $anio = $hoy['year'];
    $mes = $hoy['mon'];
    $dia = $hoy['mday'];
    $hora = $hoy['hours'];
    $minutos = $hoy['minutes'];
    $fecha = $dia."/".$mes."/".$anio." - ".$hora.":".$minutos;
    return $fecha;
}
function nombreProducto($idProducto){
    include("../../conexion/conexion.php");
    $query = "SELECT * FROM productos WHERE id='".$idProducto."'";
    $result = mysqli_query($enlace, $query);
    $row = mysqli_fetch_array($result);
    return $row['nombre'];
}
function numeroFactura(){
    include("../../conexion/conexion.php");
    $query = "SELECT * FROM datos WHERE dato='numeroFactura'";
    $result = mysqli_query($enlace, $query);
    $row = mysqli_fetch_array($result);
    $nFactura = $row['descripcion'];
	$nuevoNumero = $nFactura + 1;
	$query = "UPDATE datos SET descripcion='".$nuevoNumero."' WHERE dato='numeroFactura'";
	mysqli_query($enlace, $query);
    return $nFactura;
}
function calcularValor($idIngrediente, $cantidad, $precio, $idProducto){
	include("../../conexion/conexion.php");
	if($idIngrediente > 0){
		return $cantidad * $precio;
	}else{
		$query = "SELECT * FROM productos WHERE id='".$idProducto."'";
		$result = mysqli_query($enlace, $query);
	    $row = mysqli_fetch_array($result);
		return $row['precio'] * $cantidad;
	}
}
$numeroFactura = numeroFactura();

if($mesa >= 0){
	include("../../conexion/conexion.php");
	$query = "SELECT * FROM pedidopendiente WHERE mesa='".$mesa."'";
    $result = mysqli_query($enlace, $query);
    while($row = mysqli_fetch_array($result)){
        $idProducto = $row['producto'];
        $idIngrediente = $row['ingrediente'];
        $cantidad = $row['cantidad'];
        $precio = $row['precio'];
        $item = nombreProducto($idProducto);
        $valor = calcularValor($idIngrediente, $cantidad, $precio, $idProducto);
		$sumaTotal += $valor;
        $pedido .= "<tr><th>".$item."</th><th>".$cantidad."</th><th>".$valor."</th></tr>";
		$hoy = getdate();
    	$anio = $hoy['year'];
    	$mes = $hoy['mon'];
    	$dia = $hoy['mday'];
    	$hora = $hoy['hours'];
   	 	$minutos = $hoy['minutes'];
		$consulta = "INSERT INTO factura(numero, mesa, producto, ingrediente, cantidad, valor, anio, mes, dia, hora, fecha) VALUES('".$numeroFactura."','".$mesa."','".$idProducto."','".$idIngrediente."', '".$cantidad."', '".$precio."', '".$anio."', '".$mes."', '".$dia."', '".$hora.":".$minutos."', '".$anio."-".$mes."-".$dia."')";
        mysqli_query($enlace,$consulta);
		$consulta = "DELETE FROM pedidopendiente WHERE mesa='".$mesa."'";
		mysqli_query($enlace,$consulta);
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

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <style type="text/css">
      
  </style>

  <title>Talonario Digital</title>
</head>
<body onload="imprimir()">
    <div id="divFactura">
        <h3>AQUI ES ALBEIRO</h3>
        <h5>Piqueteadero</h5>
        <p>
            Direccion: Carrera 33 # 37 - 44<br>
			Telefono: 225 33 89<br>
            Factura # <?php echo $numeroFactura; ?><br>
            Fecha: <?php echo obtenerFecha();?><br>
            Mesa: <?php echo $mesa; ?><br>
        </p>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Cant</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $pedido ?>
            </tbody>
        </table>
        <h3>Total : $ <?php echo $sumaTotal; ?></h3>
    </div>

  <script src="../jquery/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function imprimir(){
      window.print();
	  window.close();
    }
  </script>

</body>
</html>