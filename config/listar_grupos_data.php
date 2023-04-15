<?php
include('conexion_config.php');

$query = "SELECT g.ID_GRUPO, g.NOMBRE_GRUPO, a.NOMBRE_ACADEMIA, g.VALOR_INSCRIPCION from grupo g inner join academia a on a.ID_ACADEMIA = g.ACADEMIA_ID order by ID_GRUPO asc";
$resultado = mysqli_query($conexion, $query);

if(!$resultado){
///
}else{
    while($data = mysqli_fetch_assoc($resultado)){
        $arreglo['data'][] = $data;
    }
    echo json_encode($arreglo);
}

mysqli_free_result($resultado);
?>