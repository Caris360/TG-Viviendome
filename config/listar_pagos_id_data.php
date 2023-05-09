<?php

include('conexion_config.php');
$IdCliente = $_POST['IDCliente'];
$tipo = $_POST['TipoInscripcion'];

switch ($tipo) {
    case 'Taller':
        $queryTaller = "SELECT I.ID_INSCRIPCION, T.VALOR FROM inscripciones I INNER JOIN TALLER T ON T.ID_TALLER = I.TALLER_ID WHERE I.IDENTIFICACION_CLIENTE = '$IdCliente' AND I.ESTADO_INSCRIPCION = 'Debe'";
        $resultado = mysqli_query($conexion, $queryTaller); 
        $bodyhtml ="<label style='font-family: Poppins-Bold;' class='form-label' for='form3Example8'>Seleccione Valor:</label><select id='SeleccionarServicio' name='SeleccionarServicio' class='form-control form-control-lg' ><option selected disabled>Seleccione uno</option>"  ;  
        while ($datos = mysqli_fetch_array($resultado)) {
            $bodyhtml = $bodyhtml . '<option value='.$datos['ID_INSCRIPCION'].'>'.$datos['VALOR'].'</option>';
        }   
        echo $bodyhtml."</select>";
        break;

    case 'Grupo':
        $queryGrupo = "SELECT I.ID_INSCRIPCION, G.VALOR_INSCRIPCION FROM inscripciones I INNER JOIN GRUPO G ON G.ID_GRUPO = I.GRUPO_ID WHERE I.IDENTIFICACION_CLIENTE = '$IdCliente' AND I.ESTADO_INSCRIPCION = 'Debe'";
        $resultado = mysqli_query($conexion, $queryGrupo); 
        $bodyhtml ="<label style='font-family: Poppins-Bold;' class='form-label' for='form3Example8'>Seleccione Valor:</label><select id='SeleccionarServicio' name='SeleccionarServicio' class='form-control form-control-lg' ><option selected disabled>Seleccione uno</option>"  ;  
        while ($datos = mysqli_fetch_array($resultado)) {
            $bodyhtml = $bodyhtml . '<option value='.$datos['ID_INSCRIPCION'].'>'.$datos['VALOR_INSCRIPCION'].'</option>';
        }   
        echo $bodyhtml."</select>";
        break;

    case 'Clase':
        $queryClase = "SELECT I.ID_INSCRIPCION, I.IDENTIFICACION_CLIENTE, COALESCE(G.NOMBRE_GRUPO, 'N/A') NOMBRE_GRUPO,  COALESCE(sum(C.VALOR), 0) VALOR_CLASES FROM INSCRIPCIONES I LEFT JOIN GRUPO G ON G.ID_GRUPO = I.GRUPO_ID LEFT JOIN CLASE C ON C.GRUPO_ID = G.ID_GRUPO WHERE I.ESTADO_INSCRIPCION = 'Debe' AND I.IDENTIFICACION_CLIENTE = '$IdCliente' AND I.GRUPO_ID <> 0 GROUP BY I.IDENTIFICACION_CLIENTE, NOMBRE_GRUPO";
        $resultado = mysqli_query($conexion, $queryClase); 
        $bodyhtml ="<label style='font-family: Poppins-Bold;' class='form-label' for='form3Example8'>Seleccione Valor:</label><select id='SeleccionarServicio' name='SeleccionarServicio' class='form-control form-control-lg' ><option selected disabled>Seleccione uno</option>"  ;  
        while ($datos = mysqli_fetch_array($resultado)) {
            $bodyhtml = $bodyhtml . '<option value='.$datos['ID_INSCRIPCION'].'>'.$datos['VALOR_CLASES'].'</option>';
        }   
        echo $bodyhtml."</select>";
        break;
        
    }                                                               

?>