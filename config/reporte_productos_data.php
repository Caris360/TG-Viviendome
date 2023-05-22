<?php

include('conexion_config.php');

$query = "SELECT NOMBRE_PRODUCTO, VALOR_UNITARIO, STOCK, COMPLEMENTO from producto";
$resultado = mysqli_query($conexion, $query);

if($resultado){
    while($data = mysqli_fetch_assoc($resultado)){
        $arreglo['data'][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($resultado);

?>