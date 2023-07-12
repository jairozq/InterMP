<!doctype html>
<html lang="en">

<head>
  <title>Resultado de la busqueda</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="icon" href="../../Imagenes/LogoINTERMP.png">
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark border-5 border-bottom border-success">
      <div class="container-fluid">
      <?php
        session_start();
        $_SESSION['id']= $_SESSION['id'];
      ?>
      <!--icono-->
      <a class="navbar-brand" href="#">
        <img src="../../Imagenes/LogoINTERMP.png" alt="LogoINTERMP" width="auto" height="60px">
        <span class="text-warnig"><b><pre><?php echo "Id ". $_SESSION['id']; ?></pre><b></span>
      </a>
        <!--Boton-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--elementos del menu colapsable-->
        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav ms-3">
            <li class="nav-item"><a class="nav-link" href="../Home.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="../Menu.php">Menu</a></li>
            <li class="nav-item"><a class="nav-link" href="../../Inicio.php">Cerrar Sesión</a></li>
          </ul>
        </div>

        <form class="d-flex" action="BuscarRuta.php" method="post">
            <input class="form-control me-2" type="search" name="txt_consulta" id="txt_consulta" placeholder="Buscar ID de Ruta..." aria-label="Search">
            <button class="btn btn-outline-success text-light" type="submit" id=btn-buscar>Buscar</button>
        </form>

      </div>
    </nav>

  <div class = "container">
    <h4>Resultado De La Busqueda</h4>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-inverse">
        <tr>
            <th>Id De Ruta</th>
            <th>Conductor</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Asiento Del Copiloto</th>
            <th>Asiento Izquierdo</th>
            <th>Asiento Central</th>
            <th>Asiento Derecho</th>
            </tr>
        </thead>
        
        <tbody id="tbl-RutasResultado" class="table-group-divider">
          <?php
            include("../../Conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            $txt_consulta = $_POST["txt_consulta"];
            $db_conexion ->real_query("SELECT t.UsuarioId,t.IdRuta,r.Conductor,r.Fecha,r.Hora,r.RutaId,r.AsientoCop,r.AsientoIzq,r.AsientoCen,r.AsientoDer,t.Asiento FROM ruta as r inner join tiquetes as t ON t.IdRuta = r.RutaId WHERE r.RutaId='". $txt_consulta ."';");
            $resultado = $db_conexion->use_result();

            while($fila = $resultado->fetch_assoc()){
              if($fila['AsientoCop']=="No Disponible" && $fila['Asiento']=='Copiloto'){
                echo"<td>". $fila['RutaId'] ."</td>";
                echo"<td>". $fila['Conductor'] ."</td>";
                echo"<td>". $fila['Fecha'] ."</td>";
                echo"<td>". $fila['Hora'] ."</td>";
                echo"<td> Tu Reserva </td>";
                echo"<td>". $fila['AsientoIzq'] ."</td>";
                echo"<td>". $fila['AsientoCen'] ."</td>";
                echo"<td>". $fila['AsientoDer'] ."</td>";
                echo"<tr>";
              }if($fila['AsientoIzq']=="No Disponible" && $fila['Asiento']=='Izquierdo'){
                echo"<td>". $fila['RutaId'] ."</td>";
                echo"<td>". $fila['Conductor'] ."</td>";
                echo"<td>". $fila['Fecha'] ."</td>";
                echo"<td>". $fila['Hora'] ."</td>";
                echo"<td>". $fila['AsientoCop'] ."</td>";
                echo"<td> Tu Reserva </td>";
                echo"<td>". $fila['AsientoCen'] ."</td>";
                echo"<td>". $fila['AsientoDer'] ."</td>";
                echo"<tr>";
              }if($fila['AsientoCen']=="No Disponible" && $fila['Asiento']=='Central'){
                echo"<td>". $fila['RutaId'] ."</td>";
                echo"<td>". $fila['Conductor'] ."</td>";
                echo"<td>". $fila['Fecha'] ."</td>";
                echo"<td>". $fila['Hora'] ."</td>";
                echo"<td>". $fila['AsientoCop'] ."</td>";
                echo"<td>". $fila['AsientoIzq'] ."</td>";
                echo"<td> Tu Reserva </td>";
                echo"<td>". $fila['AsientoDer'] ."</td>";
                echo"<tr>";
              }if($fila['AsientoDer']=="No Disponible" && $fila['Asiento']=='Derecho'){
                echo"<td>". $fila['RutaId'] ."</td>";
                echo"<td>". $fila['Conductor'] ."</td>";
                echo"<td>". $fila['Fecha'] ."</td>";
                echo"<td>". $fila['Hora'] ."</td>";
                echo"<td>". $fila['AsientoCop'] ."</td>";
                echo"<td>". $fila['AsientoIzq'] ."</td>";
                echo"<td>". $fila['AsientoCen'] ."</td>";
                echo"<td> Tu Reserva </td>";
                echo"<tr>";
              }
            }
            $db_conexion ->close();
          ?>
        </tbody>
      </table>
    </div>

  <div class = "container">
    <h4>Listado De Viajes</h4>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-inverse">
            <tr>
            <th>Id De Ruta</th>
            <th>Conductor</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Asiento Del Copiloto</th>
            <th>Asiento Izquierdo</th>
            <th>Asiento Central</th>
            <th>Asiento Derecho</th>
            </tr>
        </thead>
        
        <tbody id="tbl-Lista-Rutas">
          <?php
            include("../../Conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            $db_conexion ->real_query("SELECT t.UsuarioId,t.IdRuta,r.Conductor,r.Fecha,r.Hora,r.RutaId,r.AsientoCop,r.AsientoIzq,r.AsientoCen,r.AsientoDer,t.Asiento FROM ruta as r inner join tiquetes as t ON t.IdRuta = r.RutaId WHERE t.UsuarioId =". $_SESSION['id'] .";");
            $resultado = $db_conexion->use_result();

            while($fila = $resultado->fetch_assoc()){
              if($fila['AsientoCop']=="No Disponible" && $fila['Asiento']=='Copiloto'){
                echo"<td>". $fila['RutaId'] ."</td>";
                echo"<td>". $fila['Conductor'] ."</td>";
                echo"<td>". $fila['Fecha'] ."</td>";
                echo"<td>". $fila['Hora'] ."</td>";
                echo"<td> Tu Reserva </td>";
                echo"<td>". $fila['AsientoIzq'] ."</td>";
                echo"<td>". $fila['AsientoCen'] ."</td>";
                echo"<td>". $fila['AsientoDer'] ."</td>";
                echo"<tr>";
              }if($fila['AsientoIzq']=="No Disponible" && $fila['Asiento']=='Izquierdo'){
                echo"<td>". $fila['RutaId'] ."</td>";
                echo"<td>". $fila['Conductor'] ."</td>";
                echo"<td>". $fila['Fecha'] ."</td>";
                echo"<td>". $fila['Hora'] ."</td>";
                echo"<td>". $fila['AsientoCop'] ."</td>";
                echo"<td> Tu Reserva </td>";
                echo"<td>". $fila['AsientoCen'] ."</td>";
                echo"<td>". $fila['AsientoDer'] ."</td>";
                echo"<tr>";
              }if($fila['AsientoCen']=="No Disponible" && $fila['Asiento']=='Central'){
                echo"<td>". $fila['RutaId'] ."</td>";
                echo"<td>". $fila['Conductor'] ."</td>";
                echo"<td>". $fila['Fecha'] ."</td>";
                echo"<td>". $fila['Hora'] ."</td>";
                echo"<td>". $fila['AsientoCop'] ."</td>";
                echo"<td>". $fila['AsientoIzq'] ."</td>";
                echo"<td> Tu Reserva </td>";
                echo"<td>". $fila['AsientoDer'] ."</td>";
                echo"<tr>";
              }if($fila['AsientoDer']=="No Disponible" && $fila['Asiento']=='Derecho'){
                echo"<td>". $fila['RutaId'] ."</td>";
                echo"<td>". $fila['Conductor'] ."</td>";
                echo"<td>". $fila['Fecha'] ."</td>";
                echo"<td>". $fila['Hora'] ."</td>";
                echo"<td>". $fila['AsientoCop'] ."</td>";
                echo"<td>". $fila['AsientoIzq'] ."</td>";
                echo"<td>". $fila['AsientoCen'] ."</td>";
                echo"<td> Tu Reserva </td>";
                echo"<tr>";
              }
            }
            $db_conexion ->close();
          ?>
        </tbody>
    
    </div> 
  <div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

</body>

</html>