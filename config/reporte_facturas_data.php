<?php

include('conexion_config.php');

$query = "SELECT ID_FACTURA, FECHA_FACTURA, VALOR_TOTAL FROM factura ORDER BY FECHA_FACTURA, ID_FACTURA ASC";
$resultado = mysqli_query($conexion, $query);

if($resultado){
    while($data = mysqli_fetch_assoc($resultado)){
        $arreglo['data'][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($resultado);

?>