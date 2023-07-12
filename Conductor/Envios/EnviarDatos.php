<?php
    if(!empty($_POST)){
        $txt_identificacion = $_POST["txt_identificacion"];
        $txt_nombres = $_POST["txt_nombres"];
        $txt_primerApellido = $_POST["txt_primerApellido"];
        $txt_segundoApellido = $_POST["txt_segundoApellido"];
        $txt_direccion = $_POST["txt_direccion"];
        $txt_codPostal = $_POST["txt_codPostal"];
        $txt_telefono = $_POST["txt_telefono"];
        $drop_genero = $_POST["drop_genero"];
        $txt_fn = $_POST["txt_fn"];
        $txt_correo = $_POST["txt_correo"];

        if(isset($_POST["btn_actualizar"])){
            include("../../Conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            
            if(!empty($txt_nombres)){
                $sql = "UPDATE usuario SET Nombres ='". $txt_nombres ."' WHERE UsuarioId= ". $txt_identificacion .";";
                if($db_conexion->query($sql)==true){
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }
            }
            if(!empty($txt_primerApellido)){
                $sql = "UPDATE usuario SET PrimerApellido='". $txt_primerApellido ."'WHERE UsuarioId= ". $txt_identificacion .";";
                if($db_conexion->query($sql)==true){
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }
            }
            if(!empty($txt_segundoApellido)){
                $sql = "UPDATE usuario SET SegundoApellido='". $txt_segundoApellido ."' WHERE UsuarioId= ". $txt_identificacion .";";
                if($db_conexion->query($sql)==true){
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }
            }
            if(!empty($txt_direccion)){
                $sql = "UPDATE usuario SET Direccion='". $txt_direccion ."' WHERE UsuarioId= ". $txt_identificacion .";";
                if($db_conexion->query($sql)==true){
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }
            }
            if(!empty($txt_codPostal)){
                $sql = "UPDATE usuario SET CodigoPostal='". $txt_codPostal ."' WHERE UsuarioId= ". $txt_identificacion .";";
                if($db_conexion->query($sql)==true){
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }
            }
            if(!empty($txt_telefono)){
                $sql = "UPDATE usuario SET Telefono=". $txt_telefono ." WHERE UsuarioId= ". $txt_identificacion .";";
                if($db_conexion->query($sql)==true){
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }
            }
            if(!empty($drop_genero)){
                if($drop_genero==1){
                    $sql = "UPDATE usuario SET Genero='Hombre' WHERE UsuarioId= ". $txt_identificacion .";";
                    if($db_conexion->query($sql)==true){
                    }else{
                        echo"Error". $Sql ."<br>". $db_conexion->close();
                    }
                }
                if($drop_genero==2){
                    $sql = "UPDATE usuario SET Genero='Mujer' WHERE UsuarioId= ". $txt_identificacion .";";
                    if($db_conexion->query($sql)==true){
                    }else{
                        echo"Error". $Sql ."<br>". $db_conexion->close();
                    }
                }
            }
            if(!empty($txt_fn)){
                $sql = "UPDATE usuario SET FechaNacimiento='". $txt_fn ."' WHERE UsuarioId= ". $txt_identificacion .";";
                if($db_conexion->query($sql)==true){
                    session_start();
                    $_SESSION['error']=false;
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }
            }
            //validar que no este repetido
            if(!empty($txt_correo)){
                $sql = "UPDATE usuario SET Correo='". $txt_correo ."'WHERE UsuarioId= ". $txt_identificacion .";";
                if($db_conexion->query($sql)==true){
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }
            }
            if($_SESSION['error']==false){
                $_SESSION['guardado']==true;
            }
            header("Location: ../Menu/ActualizarDatos.php");
        }
    }
?>