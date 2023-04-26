<?php
include('conexion_config.php');
$idTaller = $_GET['valor'];
$sql =  mysqli_query($conexion, "SELECT VALOR_INSCRIPCION FROM GRUPO WHERE ID_GRUPO = '$idTaller'");
$resultado = mysqli_fetch_array($sql);
echo $resultado[0];
?>