<?php

include('conexion_config.php');
$Consulta = $_POST['Consulta'];

switch ($Consulta) {
    case '1':
        include('conexion_config.php');
        $query = "SELECT c.NOMBRE_PUBLICO, COALESCE(g.NOMBRE_GRUPO, 'N/A') NOMBRE_GRUPO, COALESCE(t.NOMBRE_TALLER, 'N/A') NOMBRE_TALLER, i.VALOR, i.FECHA_INSCRIPCION, i.ESTADO_INSCRIPCION FROM inscripciones i INNER JOIN cliente c ON i.IDENTIFICACION_CLIENTE = c.IDENTIFICACION_CLIENTE LEFT JOIN grupo g ON i.GRUPO_ID = g.ID_GRUPO LEFT JOIN taller t ON i.TALLER_ID = t.ID_TALLER WHERE i.ESTADO_INSCRIPCION = 'Pago'";
        $resultado = mysqli_query($conexion, $query);
        if ($resultado) {
            while ($data = mysqli_fetch_assoc($resultado)) {
                $arreglo['data'][] = $data;
            }
            echo json_encode($arreglo);
        }
        mysqli_free_result($resultado);
        break;
    case '2':
        include('conexion_config.php');
        $query = "SELECT c.NOMBRE_PUBLICO, COALESCE(g.NOMBRE_GRUPO, 'N/A') NOMBRE_GRUPO, COALESCE(t.NOMBRE_TALLER, 'N/A') NOMBRE_TALLER, i.VALOR, COALESCE(p.VALOR_PENDIENTE, i.VALOR) VALOR_PENDIENTE, i.FECHA_INSCRIPCION, i.ESTADO_INSCRIPCION FROM inscripciones i INNER JOIN cliente c ON i.IDENTIFICACION_CLIENTE = c.IDENTIFICACION_CLIENTE LEFT JOIN grupo g ON i.GRUPO_ID = g.ID_GRUPO LEFT JOIN taller t ON i.TALLER_ID = t.ID_TALLER LEFT JOIN pagos p ON i.ID_INSCRIPCION = p.INSCRIPCION_ID WHERE i.ESTADO_INSCRIPCION = 'Debe'";
        $resultado = mysqli_query($conexion, $query);
        if ($resultado) {
            while ($data = mysqli_fetch_assoc($resultado)) {
                $arreglo['data'][] = $data;
            }
            echo json_encode($arreglo);
        }
        mysqli_free_result($resultado);
        break;
    case '3':
        include('conexion_config.php');
        $query = "SELECT c.NOMBRE_PUBLICO, COALESCE(g.NOMBRE_GRUPO, 'N/A') NOMBRE_GRUPO, COALESCE(t.NOMBRE_TALLER, 'N/A') NOMBRE_TALLER, i.VALOR, COALESCE(p.VALOR_PENDIENTE, i.VALOR) VALOR_PENDIENTE, i.FECHA_INSCRIPCION, i.ESTADO_INSCRIPCION FROM inscripciones i INNER JOIN cliente c ON i.IDENTIFICACION_CLIENTE = c.IDENTIFICACION_CLIENTE LEFT JOIN grupo g ON i.GRUPO_ID = g.ID_GRUPO LEFT JOIN taller t ON i.TALLER_ID = t.ID_TALLER LEFT JOIN pagos p ON i.ID_INSCRIPCION = p.INSCRIPCION_ID";
        $resultado = mysqli_query($conexion, $query);
        if ($resultado) {
            while ($data = mysqli_fetch_assoc($resultado)) {
                $arreglo['data'][] = $data;
            }
            echo json_encode($arreglo);
        }
        mysqli_free_result($resultado);
        break;
}

?>