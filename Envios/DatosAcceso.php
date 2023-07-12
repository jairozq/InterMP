<?php
    if (!empty($_POST)) {
        $txt_correo = $_POST["txt_correo"];
        $txt_contraseña = $_POST["txt_contraseña"];

        if (isset($_POST["btn_ingresar"])) {
            include("../Conexion.php");
            $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass, $db_nombre);
            $db_conexion->real_query("SELECT UsuarioId,Correo,Contraseña,TipoAcceso FROM acceso WHERE Correo='" . $txt_correo . "';");
            $resultado = $db_conexion->use_result();

            if($txt_correo != null){
                if($txt_contraseña != null){
                    while ($fila = $resultado->fetch_assoc()) {
                        if ($txt_contraseña == $fila['Contraseña']) {
                            session_start();
                            $_SESSION['id'] = $fila['UsuarioId'];

                            if ($fila['TipoAcceso'] == "Admin") {
                                header("Location: ../Admin/Home.php");
                            }
                            if ($fila['TipoAcceso'] == "Conductor") {
                                header("Location: ../Conductor/Home.php");
                            }
                            if ($fila['TipoAcceso'] == "Usuario") {
                                header("Location: ../Usuario/Home.php");
                            }
                        } else {
                                session_start();
                                $_SESSION['error1'] = true;
                                header('Location: ../Inicio.php');
                        }
                    }
                }else{
                    session_start();
                    $_SESSION['error3'] = true;
                    header('Location: ../Inicio.php');
                }
            }else{
                session_start();
                $_SESSION['error2'] = true;
                header('Location: ../Inicio.php');
            }
        }
    }
?>