<?php

include('conexion_config.php');
$IdCliente = $_POST['IDCliente'];
$tipo = $_POST['TipoInscripcion'];

switch ($tipo) {
    case 'Taller':
        $queryTaller = "SELECT I.ID_INSCRIPCION, T.VALOR FROM inscripciones I INNER JOIN TALLER T ON T.ID_TALLER = I.TALLER_ID WHERE I.IDENTIFICACION_CLIENTE = '$IdCliente' AND I.ESTADO_INSCRIPCION = 'Debe'";
        $resultado = mysqli_query($conexion, $queryTaller); 
        $bodyhtml ="<label style='font-family: Poppins-Bold;' class='form-label' for='form3Example8'>Seleccione Valor:</label><select id='SeleccionarServicio' name='SeleccionarServicio' class='form-control form-control-lg' ><option selected disabled value='Uno'>Seleccione uno</option>"  ;  
        while ($datos = mysqli_fetch_array($resultado)) {
            $bodyhtml = $bodyhtml . '<option value='.$datos['ID_INSCRIPCION'].'>'.$datos['VALOR'].'</option>';
        }   
        echo $bodyhtml."</select>";
        break;

    case 'Grupo':
        $queryGrupo = "SELECT I.ID_INSCRIPCION, I.VALOR FROM inscripciones I INNER JOIN GRUPO G ON G.ID_GRUPO = I.GRUPO_ID WHERE I.IDENTIFICACION_CLIENTE = '$IdCliente' AND I.ESTADO_INSCRIPCION = 'Debe'";
        $resultado = mysqli_query($conexion, $queryGrupo); 
        $bodyhtml ="<label style='font-family: Poppins-Bold;' class='form-label' for='form3Example8'>Seleccione Valor:</label><select id='SeleccionarServicio' name='SeleccionarServicio' class='form-control form-control-lg' ><option selected disabled value='Uno'>Seleccione uno</option>"  ;  
        while ($datos = mysqli_fetch_array($resultado)) {
            $bodyhtml = $bodyhtml . '<option value='.$datos['ID_INSCRIPCION'].'>'.$datos['VALOR'].'</option>';
        }   
        echo $bodyhtml."</select>";
        break;
        
    }                                                               

?>