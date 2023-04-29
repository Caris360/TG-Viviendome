<?php

include('conexion_config.php');

$query = "SELECT I.ID_INSCRIPCION, I.IDENTIFICACION_CLIENTE, COALESCE(G.NOMBRE_GRUPO, 'N/A') NOMBRE_GRUPO, COALESCE(T.NOMBRE_TALLER, 'N/A') NOMBRE_TALLER, I.VALOR VALOR_INSCRIPCION, COALESCE(sum(C.VALOR), 0) VALOR_CLASES, I.ESTADO_INSCRIPCION FROM INSCRIPCIONES I LEFT JOIN GRUPO G ON G.ID_GRUPO = I.GRUPO_ID LEFT JOIN TALLER T ON T.ID_TALLER = I.TALLER_ID LEFT JOIN CLASE C ON C.GRUPO_ID = G.ID_GRUPO WHERE I.ESTADO_INSCRIPCION = 'Debe' GROUP BY IDENTIFICACION_CLIENTE, NOMBRE_GRUPO, NOMBRE_TALLER";
$resultado = mysqli_query($conexion, $query);

if($resultado){
    while($data = mysqli_fetch_assoc($resultado)){
        $arreglo['data'][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($resultado);

?>