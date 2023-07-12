<!doctype html>
<html lang="en">

<head>
  <title>Inicio</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="icon" href="../Imagenes/LogoINTERMP.png" >
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
        <img src="../Imagenes/LogoINTERMP.png" alt="LogoINTERMP" width="auto" height="60px">
        <span class="text-warnig"><b><pre><?php echo "Id ". $_SESSION['id']; ?></pre><b></span>
      </a>
      <!--Boton-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
    <!--elementos del menu colapsable-->
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-3">
          <li class="nav-item"><a class="nav-link" href="Home.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link active" href="Menu.php">Menu</a></li>
          <li class="nav-item"><a class="nav-link" href="../Inicio.php">Cerrar Sesión</a></li>
        </ul>
      </div>

    </div>
  </nav>

  <div class="navbar container-fluid justify-content-center align-items-center" style = "height: auto; width: auto">
    <tbody>
      <div class="container justify-content-center d-flex align-items-center" style = "height: auto; width: auto">
        <li class="nav-item">
          <a class="nav-link border rounded-4 text-center m-5 border-success border-4" style = "height: 240px; width: 260px" href="Menu/ActualizarDatos.php">
            <img class="img-center mt-4 mb-3" src="../Imagenes/IconoDatosUsuario.png" alt="LogoINTERMP" width="auto" height="150px">
            <pre><h7 class="border rounded-5 border-dark border-2"> Actualizar Datos <h7></pre>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link border rounded-4 text-center m-5 border-success border-4" style = "height: 240px; width: 260px" href="Menu/TipoDeReserva.php">
            <img class="img-center mt-4 mb-3" src="../Imagenes/IconoReservar.png" alt="LogoINTERMP" width="auto" height="150px">
            <pre><h7 class="border rounded-5 border-dark border-2"> Realizar Reservación <h7></pre>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link border rounded-4 text-center m-5 border-success border-4" style = "height: 240px; width: 260px" href="Menu/VerViajesProgramados.php">
            <img class="img-center mt-4 mb-3" src="../Imagenes/IconoBusqueda.png" alt="LogoINTERMP" width="auto" height="150px">
            <pre><h7 class="border rounded-5 border-dark border-2"> Ver Viajes Programados <h7></pre>
          </a>
        </li>
      </div>
    </tbody>
  </div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <script>
    $("#ActualizarDatos").on('click','div',function(e){
      var target;
      event.target;
      header("Location: Menu/ActualizarDatos.php");
    });

    $("#RealizrReservacion").on('click','div',function(e){
      header("Location: Menu/RealizarReservar.php");
    });

    $("#VerViajes").on('click','div',function(e){
      header("Location: Menu/VerViajes.php");
    });
  </script>

</body>

</html>