<?php

include('conexion_config.php');

$query = "SELECT * from academia order by NOMBRE_ACADEMIA asc";
$resultado = mysqli_query($conexion, $query);

if($resultado){
    while($data = mysqli_fetch_array($resultado)){
        $arreglo[] = $data;
    }
    echo json_encode($arreglo);
}

?>
