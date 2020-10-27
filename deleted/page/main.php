<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="author" content="Julian David Chavarro">
  <meta name="phone" content="3044592992">
  <meta name="description" content="Software Talonario Digital">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <style>
  /* Permite corregir el fondo de pantalla */
  html {
    background: url(../images/bg_meseros.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
  body{
    background: none;
  }
  .container{
    text-align: center;
    margin-top: 50px;
    width: 800px;
    background-color: white;
    position: absolute;
    left: 100px;
  }
  .container .table{
    width: 120px;
    height: 120px;
    margin: 10px;
  }
  .container .delivery{
    width: 120px;
    height: 100px;
    margin: 10px;
  }
  .container table{
    margin: 0px auto;
  }
  .container table th{
    text-align: center;
    border-top: 1px solid #ddd;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
  }
  .container table td{
    border-bottom: 1px solid #ddd;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
  }
  #divNavMesero{
    width: 800px;
    position: relative;
    top: 50px;
    left: 100px;
    padding-left: 190px;
    background-color: #292B2C;
  }

  </style>

  <title>Talonario Digital</title>
</head>
<body>


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


    <br>

    <!-- mesas -->
    <table>
      <?php
      $k = 1;
      $m = 1;
      for ($i=0; $i<4 ; $i++) {
        //cabecera
        echo "<thead><tr>";
        for ($j=0; $j < 5; $j++) {
          if($k == 20){
            echo "<th>DOMICILIO</th>";
            $k++;
          }
          else{
            echo "<th>MESA ".$k."</th>";
            $k++;
          }
        }
        echo "</thead></tr>";
        //cuerpo
        echo "<tbody><tr>";
        for ($j=0; $j < 5; $j++) {
          if($m == 20){
          echo "<td><a href='domicilio.php'><img class='table' src='../images/domicilio.jpg'></a></td>";
            $m++;
          }
          else{
            echo "<td><a href='pedido.php?mesa=".$m."'><img class='table' src='../images/mesa.jpg'></a></td>";
            $m++;
          }
        }
        echo "</tbody></tr>";
      }
      ?>
    </table>
    <br>
  </div>
  <script src="../jquery/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
