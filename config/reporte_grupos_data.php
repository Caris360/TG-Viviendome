<?php

include('conexion_config.php');

$query = "SELECT g.NOMBRE_GRUPO, a.NOMBRE_ACADEMIA, g.VALOR_INSCRIPCION, (G.VALOR_INSCRIPCION + COALESCE(sum(C.VALOR), 0)) VALOR_TOTAL from grupo g inner join academia a on a.ID_ACADEMIA = g.ACADEMIA_ID LEFT JOIN CLASE C ON C.GRUPO_ID = G.ID_GRUPO GROUP BY NOMBRE_GRUPO order by NOMBRE_GRUPO asc";
$resultado = mysqli_query($conexion, $query);

if($resultado){
    while($data = mysqli_fetch_assoc($resultado)){
        $arreglo['data'][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($resultado);

?>