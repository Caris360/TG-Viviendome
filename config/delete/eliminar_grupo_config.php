<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$ID = $_POST['IDE'];

$EliminarGrupo = mysqli_query($conexion, "DELETE FROM grupo WHERE ID_GRUPO = '$ID'");
$query = mysqli_query($conexion, "SELECT * FROM grupo");
$number=1;

while ($row=mysqli_fetch_array($query)) {
    $id=$row['ID_GRUPO'];
    $sql = mysqli_query($conexion,"UPDATE grupo SET ID_GRUPO= '$number' where ID_GRUPO ='$id'");
    $number++;
}

header('location: /gestion_grupos.php');

?>