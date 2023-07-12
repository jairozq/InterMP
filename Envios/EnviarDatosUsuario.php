<?php
if(!empty($_POST)){
    $txt_identificacion = $_POST["txt_identificacion"];
    $txt_correo = $_POST["txt_correo"];
    $txt_telefono = $_POST["txt_telefono"];
    $txt_nombres = $_POST["txt_nombres"];
    $txt_primerApellido = $_POST["txt_primerApellido"];
    $txt_segundoApellido = $_POST["txt_segundoApellido"];
    $txt_contraseña1 = $_POST["txt_contraseña1"];
    $txt_contraseña2 = $_POST["txt_contraseña2"];

    if(isset($_POST["btn_agregar"])){
        if($txt_contraseña1==$txt_contraseña2){
            include("../Conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            $resultados = mysqli_query($db_conexion,"SELECT * FROM usuario WHERE UsuarioId=". $txt_identificacion .";");
            $datos = mysqli_fetch_assoc($resultados);

            if($txt_identificacion==$datos['UsuarioId']){
                session_start();
                $_SESSION['error2'] = true;
                header("Location: ../AgregarUsuario.php");
            }else{
                $resultados = mysqli_query($db_conexion,"SELECT * FROM usuario WHERE Correo='". $txt_correo ."';");
                $datos = mysqli_fetch_assoc($resultados);

                if($txt_correo==$datos['Correo']){
                    session_start();
                    $_SESSION['error3'] = true;
                    header("Location: ../AgregarUsuario.php");
                }else{
                    $sql = "INSERT INTO usuario(UsuarioId,Nombres,PrimerApellido,SegundoApellido,Telefono,Correo) values (". $txt_identificacion .",'". $txt_nombres ."','". $txt_primerApellido ."','". $txt_segundoApellido ."',". $txt_telefono .",'". $txt_correo ."');";
                    
                    if($db_conexion->query($sql)===true){
                        $sql ="INSERT INTO acceso(UsuarioId,Correo,Contraseña,TipoAcceso) values (". $txt_identificacion .",'". $txt_correo ."','". $txt_contraseña1 ."','Usuario');";

                        if($db_conexion->query($sql)===true){
                            session_start();
                            $_SESSION['id']= $txt_identificacion;
                            header("Location: ../Usuario/Home.php");
                        }else{
                            echo"Error". $Sql ."<br>". $db_conexion->close();    
                        }
                    }else{
                        echo"Error". $Sql ."<br>". $db_conexion->close();
                    }
                }
            }
        }else{
            session_start();
            $_SESSION['error1'] = true;
            header("Location: ../AgregarUsuario.php");
        }
    }
}
?>