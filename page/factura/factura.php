<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Julian David Chavarro">
  <meta name="phone" content="3044592992">
  <meta name="description" content="Software Talonario Digital">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../style/factura.css">

  <title>Talonario Digital</title>
</head>
<body>
  <br>

  <div class="container" id="container">
      <!-- mesa -->
      <div class="elementosPedido">
        <label for="inputMesa">Mesa:</label>
        <input type="number" class="form-control" id="inputMesa" placeholder="Numero de Mesa">
      </div>

      <hr>
      <p><strong>Pedido por Facturar: </strong></p>
      <div id="divPedidoPorFacturar"></div>
      <button type="button" class="btn btn-success" id="botonImprimir">Imprimir</button>

  </div>

  <script src="../../jquery/jquery.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../script/factura.js"></script>

</body>
</html>
