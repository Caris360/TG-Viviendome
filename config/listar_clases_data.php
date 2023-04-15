<?php
include('conexion_config.php');

$query = "SELECT c.ID_CLASE,  g.NOMBRE_GRUPO, a.NOMBRE_ACADEMIA, c.FECHA_CLASE, c.HORA, c.VALOR from grupo g inner join academia a on a.ID_ACADEMIA = g.ACADEMIA_ID inner join Clase c on c.GRUPO_ID = g.ID_GRUPO order by ID_GRUPO asc";
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