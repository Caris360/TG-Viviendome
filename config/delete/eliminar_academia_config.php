<?php

require('/xampp/htdocs/ViviendomeCoaching/config/conexion_config.php');

$ID = $_POST['IDE'];

$EliminarAcademia = mysqli_query($conexion, "DELETE FROM academia WHERE ID_ACADEMIA = '$ID'");
$query = mysqli_query($conexion, "SELECT * FROM academia");
$number=1;

while ($row=mysqli_fetch_array($query)) {
    $id=$row['ID_ACADEMIA'];
    $sql = mysqli_query($conexion,"UPDATE ACADEMIA SET ID_ACADEMIA= '$number' where ID_ACADEMIA ='$id'");
    $number++;
}

header('location: /gestion_academias.php');

?>