<?php

require('conexion_config.php');

session_start();

$User = $_POST['user'];
$Password = $_POST['password'];

$consulta = mysqli_query($conexion, "SELECT * FROM usuario WHERE User = '$User' AND Password = '$Password'");

if ($consulta->num_rows == 1) {
    $datos = $consulta->fetch_assoc();
    $_SESSION['UsuarioActivo'] = $datos;
    if (isset($_SESSION['UsuarioActivo'])) {       
            header('location: /inicio.php');                   
    } else {
        header('location: /login.php');
    }
} else {
    echo "<script>alert('El usuario o contraseña son incorrectos'); window.location='/login.php'; </script>";
}

?>