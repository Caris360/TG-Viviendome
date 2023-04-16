<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Registro Talleres</title>

<body>

    <?php include('template/navbar.php'); ?>

    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">

                        <div class="col-xl-6 d-none d-sm-block">
                            <img style="height: 82vh; width: 100vh;" src="images/Talleres.jpg" alt="Sample photo" class="img-fluid" />
                        </div>

                        <div class="col-xl-6" style="height: 82vh; border-radius: 20px;">
                            <div class="card-body p-md-5 text-black">
                                <h3 style="font-family: Poppins-Bold;" class="mb-5 text-uppercase">Registrar Taller</h3>

                                <form method="POST" action="config/register/registro_taller_config.php" id="FormularioTaller">
                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Nombre Taller:</label>
                                        <input autocomplete="off" type="text" style="text-transform: capitalize;" required id="NombreTaller" name="NombreTaller" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Inscripción:</label>
                                        <input autocomplete="off" type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorTaller" name="ValorTaller" class="form-control form-control-lg" />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                                <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Fecha:</label>
                                                <span class="datepicker-toggle">
                                                    <span class="datepicker-toggle-button"></span>
                                                    <input id="Fecha" name="Fecha" min="<?= date('Y-m-d') ?>" type="date" class="datepicker-input form-control form-control-lg">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Hora Inicial:</label>
                                                        <input id="HoraInicial" name="HoraInicial" readonly placeholder="00:00" type="text" class="timepicker form-control form-control-lg">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Hora Final:</label>
                                                        <input id="HoraFinal" name="HoraFinal" readonly placeholder="00:00" type="text" class="timepicker form-control form-control-lg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end pt-3">
                                        <input style="font-family: Poppins-Bold;" type="reset" class="btn btn-light btn-lg" value="Limpiar Formulario" />
                                        <input style="font-family: Poppins-Bold;" type="submit" class="btn btn-primary btn-lg ms-2" value="Guardar" />
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

<script>
    $(document).ready(function() {
        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 30,
            dropdown: true,
            scrollbar: true
        });
    });
</script>