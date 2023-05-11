<?php
include('conexion_config.php');
$idGrupo = $_GET['valor'];
$sql =  mysqli_query($conexion, "SELECT (G.VALOR_INSCRIPCION + COALESCE(sum(C.VALOR), 0)) VALOR_TOTAL, NOMBRE_GRUPO FROM GRUPO G LEFT JOIN CLASE C ON C.GRUPO_ID = G.ID_GRUPO WHERE G.ID_GRUPO = '$idGrupo' GROUP BY NOMBRE_GRUPO");
$resultado = mysqli_fetch_array($sql);
echo $resultado[0];
?>