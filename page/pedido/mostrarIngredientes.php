<?php
include("../../conexion/conexion.php");
$productoSeleccionado = $_GET['producto'];
$mesaSeleccionada = $_GET['mesa'];
$cantidad = $_GET['cantidad'];
$idProducto = 0;
$ingredientes = "";
//extraemos el id del producto en base a su nombre
$query = "SELECT * FROM productos WHERE nombre='".$productoSeleccionado."'";
$result = mysqli_query($enlace, $query);
$row = mysqli_fetch_array($result);
$idProducto = $row['id'];

//verificamos si el producto tiene ingredientes
if($row['ingredientes'] == 1){
  $ingredientes = "<table id='tablaIngrediente'><tr>";
  //seleccionamos de la base de datos todos los ingredientes del producto
  $query = "SELECT * FROM ingredientes WHERE id_producto='".$idProducto."'";
  $result = mysqli_query($enlace, $query);
  $controlIngredientes = 1;
  while($row = mysqli_fetch_array($result)){
    $ingredientes .= "<td>
                        <div class='form-check'>
                          <label class='form-check-label radioIngrediente'>
                            <input type='radio' class='form-check-input' name='ingredientesRadios' id='ingrediente".$row['id']."' value='".$row['id']."'>
                        ".$row['ingrediente']." $".$row['precio']."<br><img class='imagenProductos' src='../../images/ingrediente_".$row['id'].".jpg'>
                          </label>
                        </div>
                      </td>";
    if(($controlIngredientes % 4) == 0){
      $ingredientes .= "</tr><tr>";
    }
    $controlIngredientes++;
  }
  $ingredientes .= "</tr></table><p>Mesa: ".$mesaSeleccionada."</p><p>cantidad: ".$cantidad."</p>";
}else{
  $ingredientes = "<input type='hidden' name='ingredientesRadios' value='0'>";
}
?>
<form method="post">
  <input type="hidden" name="mesa" value="<?php echo $mesaSeleccionada ?>">
  <input type="hidden" name="producto" value="<?php echo $idProducto ?>">
  <input type="hidden" name="cantidad" value="<?php echo $cantidad ?>">
  <?php echo $ingredientes ?>
  <!-- Boton que envia todo a la base de datos -->
  <input type="submit" class="btn btn-primary" value="Guardar">
</form>
