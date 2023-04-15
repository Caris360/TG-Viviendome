<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$id = $_POST['ID'];
$valor = $_POST['Valor'];
$fecha = $_POST['FechaE'];
$hora = $_POST['HoraE'];
$Nombre = ucfirst($grupo);
$actualizarGrupo = mysqli_query($conexion, "UPDATE clase SET FECHA_CLASE = '$fecha', HORA = '$hora', VALOR ='$valor' WHERE ID_CLASE = '$id'");
$actualizarGrupoH = mysqli_query($conexion, "UPDATE clase_historico SET FECHA_CLASE = '$fecha', HORA = '$hora', VALOR ='$valor' WHERE ID_CLASE = '$id'");

header('location: /gestion_clases.php');

?>