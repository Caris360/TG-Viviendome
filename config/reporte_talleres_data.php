<?php

include('conexion_config.php');

$query = "SELECT NOMBRE_TALLER, VALOR, FECHA_TALLER, HORA FROM `taller` order by NOMBRE_TALLER asc";
$resultado = mysqli_query($conexion, $query);

if($resultado){
    while($data = mysqli_fetch_assoc($resultado)){
        $arreglo['data'][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($resultado);

?>