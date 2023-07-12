<?php
if(!empty($_POST)){
    $txt_conductorId = $_POST["txt_conductorId"];
    $txt_rutaId = $_POST["txt_rutaId"];

    if(isset($_POST["btn_asignar"])){
        include("../../Conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql = "UPDATE ruta SET Conductor = ". $txt_conductorId ." WHERE RutaId = '". $txt_rutaId ."';";

        if($db_conexion->query($sql)==true){
            $sql = "UPDATE conductor SET Estado ='NO Disponible' WHERE ConductorId = ". $txt_conductorId .";";

            if($db_conexion->query($sql)==true){

                header("Location: ../Menu/AsignarRuta.php");
            }else{
                echo"Error". $Sql ."<br>". $db_conexion->close();
            }
        }
    }
}
?>