<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$id = $_POST['ID'];
$grupo = $_POST['NombreGrupoA'];
$valor = $_POST['ValorInscripcion'];

$Nombre = ucfirst($grupo);

$actualizarGrupo = mysqli_query($conexion, "UPDATE grupo SET NOMBRE_GRUPO = '$Nombre', VALOR_INSCRIPCION ='$valor' WHERE ID_GRUPO = '$id'");
$actualizarGrupoH = mysqli_query($conexion, "UPDATE grupo_historico SET NOMBRE_GRUPO = '$Nombre', VALOR_INSCRIPCION ='$valor' WHERE ID_GRUPO = '$id'");

header('location: /gestion_grupos.php');

?>