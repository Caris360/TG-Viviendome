<?php

include('conexion_config.php');
//$filtro = $_POST['cantidad'];

$query = "SELECT NOMBRE_ACADEMIA, CANTIDAD_GRUPOS from academia order by CANTIDAD_GRUPOS DESC LIMIT 4";
$resultado = mysqli_query($conexion, $query);

if($resultado){
    while($data = mysqli_fetch_array($resultado)){
        $arreglo[] = $data;
    }
    echo json_encode($arreglo);
}

?>
