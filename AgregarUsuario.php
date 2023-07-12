<!doctype html>
<html lang="en">

<head>
  <title>Agregar Conductor</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="icon" href="Imagenes/LogoINTERMP.png">

</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark border-5 border-bottom border-success">
    <div class="container-fluid">
      <!--icono-->
      <a class="navbar-brand" href="#">
        <img src="Imagenes/LogoINTERMP.png" alt="LogoINTERMP" width="auto" height="60px">
        <span class="text-warnig"><b><b></span>
      </a>
      <!--Boton-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--elementos del menu colapsable-->
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-3">
          <li class="nav-item"><a class="nav-link" href="Inicio.php">Iniciar sesión</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  session_start();
  $_SESSION['error1'] = $_SESSION['error1'];
  $_SESSION['error2'] = $_SESSION['error2'];
  $_SESSION['error3'] = $_SESSION['error3'];
  $_SESSION['tamaño'] = $_SESSION['tamaño'];
  if ($_SESSION['error1'] == true || $_SESSION['error2'] == true || $_SESSION['error3'] == true) {
    $_SESSION['tamaño'] = "240px";
  } else {
    $_SESSION['tamaño'] = "210px";
  }
  ?>

  <div class="container ">
    <h3>Formulario De Registro</h3>
    <div class="container">
      <h5 class="mt-3"><b>Datos Del Usuario</b></h5>
      <form class="container" action="Envios/EnviarDatosUsuario.php" method="post">
        <div class="container ">

          <div class="container d-flex align-items-center" style="height: auto; width: auto">
            <div class="m-3">
              <div><label for="lbl_identificacion" class="form-label"><b>Identificacion</b></label></div>
              <input type="number" name="txt_identificacion" id="txt_identificacion-sm" class="form-control-sm" placeholder="0123456789" Required>
            </div>
            <div class="m-3">
              <div><label for="lbl_correo" class="form-label"><b>Correo</b></label></div>
              <input type="text" name="txt_correo" id="txt_correo" class="form-control-sm" placeholder="prueba@prueba.com" Required>
            </div>
            <div class="m-3">
              <div><label for="lbl_telefono" class="form-label"><b>Telefono</b></label></div>
              <input type="number" name="txt_telefono" id="txt_telefono" class="form-control-sm" placeholder="0123456789" Required>
            </div>
          </div>

          <div class="container d-flex align-items-center mb-5" style="height: auto; width: auto">
            <div class="m-3">
              <div><label for="lbl_nombres" class="form-label"><b>Nombres</b></label></div>
              <input type="text" name="txt_nombres" id="txt_nombres" class="form-control-sm" placeholder="Nombre1 Nombre2" Required>
            </div>
            <div class="m-3">
              <div><label for="lbl_primerApellido" class="form-label"><b>Primer Apellido</b></label></div>
              <input type="text" name="txt_primerApellido" id="txt_primerApellido" class="form-control-sm" placeholder="Apellido1" Required>
            </div>
            <div class="m-3">
              <div><label for="lbl_segundoApellido" class="form-label"><b>Segundo Apellido</b></label></div>
              <input type="text" name="txt_segundoApellido" id="txt_segundoApellido" class="form-control-sm" placeholder="Apellido2" Required>
            </div>
          </div>

          <div class="container mb-3">
            <h5><b>Datos De Ingreso</b></h5>
            <div class="m-3">
              <div><label for="lbl_contraseña1" class="form-label"><b>Ingrese la Contraseña</b></label></div>
              <input type="text" name="txt_contraseña1" id="txt_contraseña1" class="form-control-sm" placeholder="*******" Required>
            </div>
            <div class="m-3">
              <div><label for="lbl_contraseña2" class="form-label"><b>Repita la Contraseña</b></label></div>
              <input type="text" name="txt_contraseña2" id="txt_contraseña2" class="form-control-sm" placeholder="*******" Required>
            </div>
            <?php
            if($_SESSION['error1']==true){
              echo "<h6 class='text-danger'><b>Las contraseñas no coinciden</b></h6>";
              $_SESSION['error1']=false;
            }
            if($_SESSION['error2']==true){
              echo "<h6 class='text-danger'><b>Ya se encuetra registrada la cedula</b></h6>";
              $_SESSION['error2']=false;
            }
            if($_SESSION['error3']==true){
              echo "<h6 class='text-danger'><b>Ya se encuentra registrado el correo</b></h6>";
              $_SESSION['error3']=false;
            }
            ?>
          </div>
        </div>

        <div class="mb-3">
          <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-success border-dark" value="Agregar">
        </div>
      </form>
    </div>

      <!-- Bootstrap JavaScript Libraries -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
      </script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
      </script>
</body>

</html>