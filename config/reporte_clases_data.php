<?php

include('conexion_config.php');

$query = "SELECT g.NOMBRE_GRUPO, c.FECHA_CLASE, c.HORA, c.VALOR from Clase c inner join Grupo g on c.GRUPO_ID = g.ID_GRUPO order by NOMBRE_GRUPO, FECHA_CLASE asc";
$resultado = mysqli_query($conexion, $query);

if($resultado){
    while($data = mysqli_fetch_assoc($resultado)){
        $arreglo['data'][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($resultado);

?>