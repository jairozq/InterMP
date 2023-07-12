<!doctype html>
<html lang="en">

<head>
  <title>Iniciar sesión</title>
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
      <a class="navbar-brand" href="PaginaInicial.php">
        <img src="Imagenes/LogoINTERMP.png" alt="LogoINTERMP" width="auto" height="60px">
        <span class="text-warnig"><b><b></span>
      </a>
    </div>
  </nav>

  <?php
  session_start();
  $_SESSION['error1'] = null;
  $_SESSION['error1'] = $_SESSION['error1'];
  $_SESSION['error2'] = $_SESSION['error2'];
  $_SESSION['error3'] = $_SESSION['error3'];
  $_SESSION['tamaño'] = $_SESSION['tamaño'];
  if($_SESSION['error1']==true || $_SESSION['error2'] == true || $_SESSION['error3'] == true){
    $_SESSION['tamaño'] = "240px";
  }else{
    $_SESSION['tamaño'] = "210px";
  }
  ?>

  <div class="container d-flex justify-content-center align-items-center" style="height: 520px">
    <div class="border rounded-4 text-center m-5 border-success border-4" style="width: 260px; height: <?php echo $_SESSION['tamaño']?>">
      <h3 class="m-2">Inicio De Sesion</h3>
          <form class="d-flex" action="Envios/DatosAcceso.php" method="post">
            <div class="col-auto mx-auto mb-2">
              <div class="mb-3">
                <label for="txt_correo" class="form-label"></label>
                <input type="text" name="txt_correo" id="txt_correo" class="form-control-sm" placeholder="Correo" require>
              </div>
              <div class="mb-3">
                <label for="txt_contraseña" class="form-label"></label>
                <input type="text" name="txt_contraseña" id="txt_contraseña" class="form-control-sm" placeholder="Contraseña" require>
              </div>
              <div>
                <input type="submit" name="btn_ingresar" id="btn_ingresar" class="btn btn-success border-1 border-5 rounded-5 border-dark" value="Ingresar">
              </div>
            </div>
          </form>
          <?php
            if($_SESSION['error1']==true){
              echo "<h6 class='text-danger'><b>Contraseña incorrecta</b></h6>";
              $_SESSION['error1']=false;
            }
            if($_SESSION['error2']==true){
              echo "<h6 class='text-danger'><b>Ingrese el correo</b></h6>";
              $_SESSION['error2']=false;
            }
            if($_SESSION['error3']==true){
              echo "<h6 class='text-danger'><b>Ingrese la ontraseña</b>   </h6>";
              $_SESSION['error3']=false;
            }
          ?>
    </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>