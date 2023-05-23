<?php

include('conexion_config.php');

$query = "SELECT TIPO_INSCRIPCION, COUNT(IDENTIFICACION_CLIENTE) CANTIDAD FROM inscripciones GROUP BY TIPO_INSCRIPCION";
$resultado = mysqli_query($conexion, $query);

if($resultado){
    while($data = mysqli_fetch_array($resultado)){
        $arreglo[] = $data;
    }
    echo json_encode($arreglo);
}

?>