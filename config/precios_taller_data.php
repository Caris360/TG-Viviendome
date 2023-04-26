<?php
include('conexion_config.php');
$idTaller = $_GET['valor'];
$sql =  mysqli_query($conexion, "SELECT VALOR FROM TALLER WHERE ID_TALLER = '$idTaller'");
$resultado = mysqli_fetch_array($sql);
echo $resultado[0];
?>