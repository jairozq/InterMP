<!--
*************************
*************************
Hacer que salga en orde**
de fecha y hora**********
*************************
*************************
-->
<!doctype html>
<html lang="en">

<head>
  <title>Pagina en PHP</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" placeholder="">

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
    </div>
  </nav>

    <div class = "container mt-2">
      <h3>Asignar Rutas</h3>
      <form class="d-flex" action="../Envios/EnviarAsignacion.php" method="post">
        <div class="col-auto">
          <div class="mb-3 clo-auto">
            <div><label for="txt_rutaId" class="form-label"><b>Ruta<b> </label></div>
            <input type="text" name="txt_rutaId" id="txt_rutaId" class="form-control-sm" Required>
          </div>
          <div class="mb-3 clo-auto">
            <div><label for="txt_conductorId" class="form-label"><b>Conductor<b></label></div>
            <input type="number" name="txt_conductorId" id="txt_conductorId" class="form-control-sm" Required>
          </div>
          <div class="mb-3">
            <input type="submit" name="btn_asignar" id="btn_asignar" class="btn btn-success border-dark" value="Asignar">
          </div>
        </div>
      </form>
    </div>


  <div class = "container">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-inverse">
            <caption>Lista De Rutas Sin Asignacion</caption>
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
        
        <tbody id="tbl-Rutas">
          <?php
            include("../../Conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            $db_conexion ->real_query("SELECT * FROM ruta WHERE Conductor IS NULL;");
            $resultado = $db_conexion->use_result();

            while($fila = $resultado->fetch_assoc()){
              echo"<td>". $fila['RutaId'] ."</td>";
              echo"<td>". $fila['Conductor'] ."</td>";
              echo"<td>". $fila['Fecha'] ."</td>";
              echo"<td>". $fila['Hora'] ."</td>";
              echo"<td>". $fila['AsientoCop'] ."</td>";
              echo"<td>". $fila['AsientoIzq'] ."</td>";
              echo"<td>". $fila['AsientoCen'] ."</td>";
              echo"<td>". $fila['AsientoDer'] ."</td>";
              echo"<tr>";
            }
            $db_conexion ->close();
          ?>
        </tbody>
      </table>
    </div> 
    <div class="table-responsive">
      <table class="table table-striped table-hover table-borderless table-primary align-middle">
        <thead class="table-inverse">
            <caption>Lista De Condoctores Disponibles</caption>
            <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Telefono</th>
            <th>Estado</th>
            </tr>
        </thead>
        
        <tbody id="tbl-Conductores-Disponibles">
          <?php
            include("../../Conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            $db_conexion ->real_query("SELECT u.UsuarioId as ConductorId,u.Nombres,u.PrimerApellido,SegundoApellido,u.Telefono,c.Estado FROM conductor as c inner join usuario as u ON c.ConductorId = u.UsuarioId WHERE c.Estado = 'Disponible';");
            $resultado = $db_conexion->use_result();

            while($fila = $resultado->fetch_assoc()){
              echo"<td>". $fila['ConductorId'] ."</td>";
              echo"<td>". $fila['Nombres'] ."</td>";
              echo"<td>". $fila['PrimerApellido'] ."</td>";
              echo"<td>". $fila['SegundoApellido'] ."</td>";
              echo"<td>". $fila['Telefono'] ."</td>";
              echo"<td>". $fila['Estado'] ."</td>";
              echo"<tr>";
            }
            $db_conexion ->close();
          ?>
        </tbody>
      </table>
    </div> 
  <div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

  <script>
    $("#tbl-Conductores-Disponibles").on('click','tr td',function(e){
      var target,ConductorId;
      target = $(event.target);
      ConductorId = target.parent('tr').find('td').eq(0).html();
      $('#txt_conductorId').val(ConductorId);
    });

    $("#tbl-Rutas").on('click','tr td',function(e){
      var target,RutaId;
      target = $(event.target);
      RutaId = target.parent('tr').find('td').eq(0).html();
      $('#txt_rutaId').val(RutaId);
    });
  </script>
</body>

</html>