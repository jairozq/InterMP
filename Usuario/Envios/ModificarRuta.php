<?php
if(!empty($_POST)){
    $txt_tiqueteId = $_POST['txt_tiqueteId'];
    $txt_rutaId = $_POST['txt_rutaId'];
    $txt_identificacion = $_POST['txt_identificacion'];
    $txt_fechaViaje = $_POST['txt_fechaViaje'];
    $txt_hora = $_POST['txt_hora'];
    $drop_asiento = $_POST['drop_asiento'];

    if(isset($_POST['btn_reservar'])){
        include("../../Conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        
        if($drop_asiento==1){
            $sql = "UPDATE ruta SET AsientoCop = 'No Disponible' WHERE RutaId='". $txt_rutaId ."'";
            if($db_conexion->query($sql)==true){
                $sql = "INSERT tiquetes(TiqueteId,IdRuta,UsuarioId,Fecha,Hora,Asiento) VALUES ('". $txt_tiqueteId ."','". $txt_rutaId ."',". $txt_identificacion .",'". $txt_fechaViaje ."','". $txt_hora ."','Copiloto')";
                if($db_conexion->query($sql)==true){
                    header("Location: ../Menu/RealizarReservacion.php");
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }    
            }else{
                echo"Error". $Sql ."<br>". $db_conexion->close();
            }
        }
        if($drop_asiento==2){
            $sql = "UPDATE ruta SET AsientoIzq = 'No Disponible' WHERE RutaId='". $txt_rutaId ."'";
            if($db_conexion->query($sql)==true){
                $sql = "INSERT tiquetes(TiqueteId,IdRuta,UsuarioId,Fecha,Hora,Asiento) VALUES ('". $txt_tiqueteId ."','". $txt_rutaId ."',". $txt_identificacion .",'". $txt_fechaViaje ."','". $txt_hora ."','Izquierdo')";
                if($db_conexion->query($sql)==true){
                    header("Location: ../Menu/RealizarReservacion.php");
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }    
            }else{
                echo"Error". $Sql ."<br>". $db_conexion->close();
            }
        }
        if($drop_asiento==3){
            $sql = "UPDATE ruta SET AsientoCen = 'No Disponible' WHERE RutaId='". $txt_rutaId ."'";
            if($db_conexion->query($sql)==true){
                $sql = "INSERT tiquetes(TiqueteId,IdRuta,UsuarioId,Fecha,Hora,Asiento) VALUES ('". $txt_tiqueteId ."','". $txt_rutaId ."',". $txt_identificacion .",'". $txt_fechaViaje ."','". $txt_hora ."','Central')";
                if($db_conexion->query($sql)==true){
                    header("Location: ../Menu/RealizarReservacion.php");
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }    
            }else{
                echo"Error". $Sql ."<br>". $db_conexion->close();
            }
        }
        if($drop_asiento==4){
            $sql = "UPDATE ruta SET AsientoDer = 'No Disponible' WHERE RutaId='". $txt_rutaId ."'";
            if($db_conexion->query($sql)==true){
                $sql = "INSERT tiquetes(TiqueteId,IdRuta,UsuarioId,Fecha,Hora,Asiento) VALUES ('". $txt_tiqueteId ."','". $txt_rutaId ."',". $txt_identificacion .",'". $txt_fechaViaje ."','". $txt_hora ."','Derecho')";
                if($db_conexion->query($sql)==true){
                    header("Location: ../Menu/RealizarReservacion.php");
                }else{
                    echo"Error". $Sql ."<br>". $db_conexion->close();
                }    
            }else{
                echo"Error". $Sql ."<br>". $db_conexion->close();
            }
        }
    }
}
?>