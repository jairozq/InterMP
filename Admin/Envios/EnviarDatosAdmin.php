<?php
if(!empty($_POST)){
    $txt_identificacion = $_POST["txt_identificacion"];
    $txt_correo = $_POST["txt_correo"];
    $txt_telefono = $_POST["txt_telefono"];
    $txt_nombres = utf8_decode($_POST["txt_nombres"]);
    $txt_primerApellido = utf8_decode($_POST["txt_primerApellido"]);
    $txt_segundoApellido = utf8_decode($_POST["txt_segundoApellido"]);
    $txt_contraseña1 = utf8_decode($_POST["txt_contraseña1"]);
    $txt_contraseña2 = utf8_decode($_POST["txt_contraseña2"]);

    if(isset($_POST["btn_agregar"])){
        if($txt_contraseña1==$txt_contraseña2){
            include("../../Conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            $sql = "INSERT INTO usuario(UsuarioId,Nombres,PrimerApellido,SegundoApellido,Telefono,Correo) values (". $txt_identificacion .",'". $txt_nombres ."','". $txt_primerApellido ."','". $txt_segundoApellido ."',". $txt_telefono .",'". $txt_correo ."');";

            if($db_conexion->query($sql)===true){
                $sql ="INSERT INTO acceso(UsuarioId,Correo,Contraseña,TipoAcceso) values (". $txt_identificacion .",'". $txt_correo ."','". $txt_contraseña1 ."','Admin');";

                if($db_conexion->query($sql)===true){
                    $sql ="INSERT INTO admins(AdminId) values (". $txt_identificacion .");";

                    if($db_conexion->query($sql)===true){
                        header("Location: ../Menu/AgregarAdmin.php");
                    }else{
                        echo"Error". $Sql ."<br>". $db_conexion->close();    
                    }
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();    
                }
            }else{
                echo"Error". $Sql ."<br>". $db_conexion->close();
            }
        }else{
            echo"Las contraseñas no son iguales";
        }
    }
}
    ?>