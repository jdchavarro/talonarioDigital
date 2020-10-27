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
	<div class="form-group row">
		<label for="inicio-input" class="col-2 col-form-label">Inicio</label>
		<div class="col-10">
			<input class="form-control" type="date" id="inicio-input" min="2017-08-01">
		</div>
	</div>
	<div class="form-group row">
		<label for="fin-input" class="col-2 col-form-label">Fin</label>
		<div class="col-10">
			<input class="form-control" type="date" id="fin-input" min="2017-08-01">
		</div>
	</div>
	
	<div id="divProductosFacturados"></div>
  </div>

  <script src="../../jquery/jquery.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../script/cuadre.js"></script>

</body>
</html>
