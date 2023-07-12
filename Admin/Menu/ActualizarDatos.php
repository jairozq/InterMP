<!doctype html>
<html lang="en">

<head>
  <title>Actualizar Datos</title>
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

  <div class="container mt-3">
    <tbody id="tbl-Rutas">
          <?php 
            include("../../Conexion.php"); 
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            $resultados = mysqli_query($db_conexion,"SELECT * FROM usuario WHERE UsuarioId=". $_SESSION['id'] .";");
            $datos = mysqli_fetch_assoc($resultados)
          ?>
    </tbody>

    <h4><b>Actualizar Datos</b></h4>
    <div class = "container">
      <h5 class="mt-3"><b>Datos Del Usuario</b></h5>
      <form class="container" action="../Envios/EnviarDatos.php" method="post">
        <div class="container ">
          <div class="container d-flex align-items-center" style = "height: auto; width: auto">
              <div class="m-3">
                <div><label for="lbl_identificacion" class="form-label"><b>Identificacion</b></label></div>
                <input type="text" name="txt_identificacion" id="txt_identificacion" class="form-control-sm" placeholder="prueba@prueba.com" readonly value="<?php echo $datos['UsuarioId'] ?>">
              </div>
              <div class="m-3">
                <div><label for="lbl_correo" class="form-label"><b>Correo</b></label></div>
                <input type="text" name="txt_correo" id="txt_correo" class="form-control-sm" placeholder="prueba@prueba.com" value="<?php echo $datos['Correo'] ?>">
              </div>
              <div class="m-3">
                <div><label for="lbl_telefono" class="form-label"><b>Telefono</b></label></div>
                <input type="number" name="txt_telefono" id="txt_telefono" class="form-control-sm" placeholder="0123456789" value="<?php echo $datos['Telefono'] ?>">
              </div>
          </div>
                    
          <div class="container d-flex align-items-center" style = "height: auto; width: auto">
            <div class="m-3">
              <div><label for="lbl_nombres" class="form-label"><b>Nombres</b></label></div>
              <input type="text" name="txt_nombres" id="txt_nombres" class="form-control-sm" placeholder="Nombre1 Nombre2" value="<?php echo $datos['Nombres'] ?>">
            </div>
            <div class="m-3">
              <div><label for="lbl_primerApellido" class="form-label"><b>Primer Apellido</b></label></div>
              <input type="text" name="txt_primerApellido" id="txt_primerApellido" class="form-control-sm" placeholder="Apellido1" value="<?php echo $datos['PrimerApellido'] ?>">
            </div>
            <div class="m-3">
              <div><label for="lbl_segundoApellido" class="form-label"><b>Segundo Apellido</b></label></div>
              <input type="text" name="txt_segundoApellido" id="txt_segundoApellido" class="form-control-sm" placeholder="Apellido2" value="<?php echo $datos['SegundoApellido'] ?>">
            </div>
          </div>

          <div class="container d-flex align-items-center" style = "height: auto; width: auto">
            <div class="m-3">
              <div><label for="lbl_direccion" class="form-label"><b>Direccion</b></label></div>
              <input type="text" name="txt_direccion" id="txt_direccion" class="form-control-sm" placeholder="calle #carrera - casa" value="<?php echo $datos['Direccion'] ?>">
            </div>
            <div class="m-3">
              <div><label for="lbl_codPostal" class="form-label"><b>Codigo Postal</b></label></div>
              <input type="text" name="txt_codPostal" id="txt_codPostal" class="form-control-sm" placeholder="####" value="<?php echo $datos['CodigoPostal'] ?>">
            </div>
            <div class="m-3">
              <div><label for="lbl_fn" class="form-label"><b>Fecha De Nacimiento</b></label></div>
              <input type="date" name="txt_fn" id="txt_fn" class="form-control-sm" placeholder="aaaa-mm-dd" value="<?php echo $datos['FechaNacimiento'] ?>">
            </div>
          </div>

          <div class="container d-flex align-items-center mb-3" style = "height: auto; width: auto">
            <div class="m-3">
              <div><label for="lbl_genero" class="form-label"><b>Genero<b></label></div>
              <select class="form-control-sm border-dark" type="form-select" name="drop_genero" id="drop_genero">
                <option value=0><?php echo $datos['Genero'] ?></option>
                <option value=1>Hombre</option>
                <option value=2>Mujer</option>
              </select>
            </div>
          </div>

        <div class="mb-3">
          <input type="submit" name="btn_actualizar" id="btn_actualizar" class="btn btn-success border-dark" value="Actualizar">
        </div>
      </div>
    </form> 
  </div>
<div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>