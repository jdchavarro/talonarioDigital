<?php include("header.php"); ?>

<link rel="stylesheet" type="text/css" href="style/mesa.css">
<?php
$mesa = $_GET["mesa"];
?>

<div id="pedido">
  <h1>Pedido</h1>
  <h2>Mesa <?php echo $mesa; ?></h2>
</div>

<div id="productos">
  <h1>Productos</h1>
</div>

<?php include("footer.php"); ?>
