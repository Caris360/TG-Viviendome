<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Registro Clientes</title>

<body>

    <?php include('template/navbar.php'); ?>

    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">

                        <div class="col-xl-6 d-none d-sm-block">
                            <img src="images/Clientes.jpg" style="height: 82vh; width: 100vh;" class="img-fluid" />
                        </div>

                        <div class="col-xl-6" style="height: auto; border-radius: 20px;">

                            <div class="card-body p-md-5 text-black">

                                <h3 style="font-family: Poppins-Bold;" class="mb-5 text-uppercase">Registrar Cliente</h3>

                                <form method="POST" action="config/register/registro_clientes_config.php" id="FormularioCliente">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Tipo Documento:</label>
                                                <select required style="font-family: Poppins-Medium;" id="TipoDocumento" name="TipoDocumento" class="form-control form-control-lg">
                                                    <option value="" disabled selected>Seleccione uno...</option>
                                                    <option value="2">Cédula Ciudadanía</option>
                                                    <option value="3">Cédula Extranjería</option>
                                                    <option value="4">Tarjeta de Identidad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example1n">Número Documento:</label>
                                                <input type="number" required id="Documento" name="Documento" class="form-control form-control-lg" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre:</label>
                                        <input style="text-transform: capitalize;" type="text" required id="NombreCliente" onkeypress="return soloLetras(event)" onblur="limpia()" name="NombreCliente" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Dirección:</label>
                                        <input type="text" required id="Direccion" name="Direccion" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example9">Contacto:</label>
                                        <input type="tel" required id="Contacto" name="Contacto" pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example90">Correo:</label>
                                        <input type="email" required id="Correo" name="Correo" class="form-control form-control-lg" />
                                    </div>

                                    <div class="d-flex justify-content-end pt-3">
                                        <input style="font-family: Poppins-Bold;" type="reset" class="btn btn-light btn-lg" value="Limpiar Formulario" />
                                        <button style="font-family: Poppins-Bold;" class="btn btn-primary btn-lg ms-2">Guardar</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

</body>

</html>