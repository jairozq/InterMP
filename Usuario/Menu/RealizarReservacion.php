<!doctype html>
<html lang="en">

<head>
  <title>Reservacion de viajes</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="icon" href="../../Imagenes/LogoINTERMP.png">

</head>

<body>
<header>
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
  </header>

  <div class="container ">
    <?php
    $val = true;
    ?>
        <h3>Formulario De Reservas De Viajes</h3>
        <div class = "container">
            <h5 class="mt-3"><b>Datos Del Tiquete</b></h5>
            <form class="container" action="../Envios/RegistrarReserva.php" method="post">
                <div class="container ">

                    <div class="container d-flex align-items-center" style = "height: auto; width: auto">
                        <div class="m-3">
                            <div><label for="lbl_tiqueteId" class="form-label"><b>ID De Tiquete</b></label></div>
                            <input type="txt" name="txt_tiqueteId" id="txt_tiqueteId" class="form-control-sm" Required readonly value="<?php echo bin2hex(openssl_random_pseudo_bytes(16,$val)); ?>">
                        </div>
                        <div class="m-3">
                            <div><label for="lbl_rutaId" class="form-label"><b>ID De Ruta</b></label></div>
                            <input type="text" name="txt_rutaId" id="txt_rutaId" class="form-control-sm" Required readonly value="<?php echo bin2hex(openssl_random_pseudo_bytes(16,$val)); ?>">
                        </div>
                        <div class="m-3">
                            <div><label for="lbl_identificacion" class="form-label"><b>Identificacion</b></label></div>
                            <input type="number" name="txt_identificacion" id="txt_identificacion" class="form-control-sm" Required readonly value="<?php echo $_SESSION['id']; ?>">
                        </div>
                    </div>
                    
                    <div class="container d-flex align-items-center " style = "height: auto; width: auto">
                      <div class="m-3">
                        <div><label for="lbl_fechaViaje" class="form-label"><b>Fecha De Viaje</b></label></div>
                        <input type="date" name="txt_fechaViaje" id="txt_fechaViaje" class="form-control-sm" placeholder="aaaa-mm-dd" Required>
                       </div>
                        <div class="m-3">
                            <div><label for="lbl_hora" class="form-label"><b>Hora Del Viaje</b></label></div>
                            <input type="time" name="txt_hora" id="txt_hora" class="form-control-sm" placeholder="Apellido1" Required>
                        </div>
                    </div>

                    <div class="container d-flex align-items-center mb-3" style = "height: auto; width: auto">
                      <div class="m-3">
                        <div><label for="lbl_asiento" class="form-label"><b>Asiento<b></label></div>
                        <select class="form-control-sm border-dark" type="form-select" name="drop_asiento" id="drop_asiento" Required>
                          <option value=0>Asiento</option>
                          <option value=1>Copiloto</option>
                          <option value=2>Izquierdo</option>
                          <option value=3>Central</option>
                          <option value=4>Derecho</option>
                        </select>
                      </div>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="submit" name="btn_reservar" id="btn_reservar" class="btn btn-success border-dark" value="Reservar">
                </div>
            </form> 
        <div>
  </div>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>