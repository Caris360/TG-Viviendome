<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$ID = $_POST['ID'];
$NombreAcademiaE = $_POST['NombreAcademiaE'];

$actualizarAcademia = mysqli_query($conexion, "UPDATE academia SET NOMBRE_ACADEMIA = '$NombreAcademiaE' WHERE ID_ACADEMIA = '$ID'");
$actualizarAcademiaH = mysqli_query($conexion, "UPDATE academia_historico SET NOMBRE_ACADEMIA = '$NombreAcademiaE' WHERE ID_ACADEMIA = '$ID'");

header('location: /gestion_academias.php');

?>