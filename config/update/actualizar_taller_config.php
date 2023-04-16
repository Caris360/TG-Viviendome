<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$id = $_POST['ID'];
$nombreTaller = $_POST['NombreTaller'];
$valor = $_POST['ValorInscripcion'];
$fecha = $_POST['FechaE'];

$NombreFinal = ucfirst($nombreTaller);

$actualizarTaller = mysqli_query($conexion, "UPDATE taller SET NOMBRE_TALLER = '$NombreFinal', VALOR = '$valor', FECHA_TALLER ='$fecha' WHERE ID_TALLER  = '$id'"); 
$actualizarTallerH = mysqli_query($conexion, "UPDATE taller_historico SET NOMBRE_TALLER = '$NombreFinal', VALOR = '$valor', FECHA_TALLER ='$fecha' WHERE ID_TALLER  = '$id'");

header('location: /listar_talleres.php');

?>