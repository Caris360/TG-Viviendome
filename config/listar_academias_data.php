<?php

include('conexion_config.php');

$query = "SELECT * from academia order by ID_ACADEMIA asc";
$resultado = mysqli_query($conexion, $query);

if($resultado){
    while($data = mysqli_fetch_assoc($resultado)){
        $arreglo['data'][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($resultado);

?>