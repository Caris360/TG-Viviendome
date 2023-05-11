<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>


<html>

<?php include('template/head.php') ?>
<title>Inscripciones</title>

<body>

    <?php include('template/navbar.php'); ?>

    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">

                        <div class="col-xl-12" style="height: 82vh; border-radius: 20px;">
                            <div class="card-body p-md-5 text-black">
                                <h3 style="font-family: Poppins-Bold;" class="mb-5 text-uppercase">Realizar Inscripción</h3>

                                <form method="POST" action="config/register/registro_inscripcion_config.php" id="FormularioTaller">

                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div class="form-outline">
                                                <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Cliente:</label>
                                                <select id="seleccionarCliente" class="js-example-basic-single form-control form-control-lg">
                                                    <option selected disabled>Seleccione uno</option>
                                                    <?php
                                                    include('config/conexion_config.php');
                                                    $sql = mysqli_query($conexion, "SELECT * FROM cliente ORDER BY NOMBRE_PUBLICO ASC");
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <option value="<?php printf($row['IDENTIFICACION_CLIENTE']) ?>"><?php printf($row['NOMBRE_PUBLICO']) ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-4">
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example1n">Número Documento:</label>
                                                        <input type="text" readonly required id="Documento" name="Documento" class="form-control form-control-lg" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Selecciona el servicio para inscribir:</label>
                                                        <select id="SeleccionarServicio" name="SeleccionarServicio" class="form-control form-control-lg" disabled>
                                                            <option selected disabled value="1">Seleccione uno</option>
                                                            <option value="2">Taller</option>
                                                            <option value="3">Grupo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="CuerpoFormulario" id="Div_2">
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre:</label>
                                                            <select id="SeleccionarTaller" name="SeleccionarTaller" class="form-control form-control-lg">
                                                                <option selected disabled>Seleccione un taller</option>
                                                                <?php
                                                                include('config/conexion_config.php');
                                                                $sql = mysqli_query($conexion, "SELECT * FROM taller");
                                                                while ($row = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option value="<?php printf($row['ID_TALLER']) ?>"><?php printf($row['NOMBRE_TALLER']) ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Inscripción:</label>
                                                            <input readonly autocomplete="off" type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorTaller" name="ValorTaller" class="form-control form-control-lg" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end pt-3">
                                            <input style="font-family: Poppins-Bold;" type="reset" class="btn btn-light btn-lg" value="Limpiar Formulario" />
                                            <input style="font-family: Poppins-Bold;" type="submit" class="btn btn-primary btn-lg ms-2" value="Guardar" />
                                        </div>
                                    </div>
                                    <div class="CuerpoFormulario" id="Div_3">
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre:</label>
                                                            <select id="SeleccionarGrupo" name="SeleccionarGrupo" class="form-control form-control-lg">
                                                                <option selected disabled>Seleccione un grupo</option>
                                                                <?php
                                                                include('config/conexion_config.php');
                                                                $sql = mysqli_query($conexion, "SELECT * FROM grupo");
                                                                while ($row = mysqli_fetch_array($sql)) {
                                                                ?>
                                                                    <option value="<?php printf($row['ID_GRUPO']) ?>"><?php printf($row['NOMBRE_GRUPO']) ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Inscripción:</label>
                                                            <input readonly autocomplete="off" type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorGrupo" name="ValorGrupo" class="form-control form-control-lg" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end pt-3">
                                            <input style="font-family: Poppins-Bold;" type="reset" class="btn btn-light btn-lg" value="Limpiar Formulario" />
                                            <input style="font-family: Poppins-Bold;" type="submit" class="btn btn-primary btn-lg ms-2" value="Guardar" />
                                        </div>
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
        $('.js-example-basic-single').select2();
        $("#seleccionarCliente").change(function() {
            var x = $('#seleccionarCliente').val();
            $('#Documento').val(x);
            $("#SeleccionarServicio").removeAttr('disabled');
            $("#SeleccionarServicio").val('1');
            $("#Div_2").hide();
            $("#Div_3").hide();
        });
        $("#SeleccionarTaller").change(function() {
            var valor = $("#SeleccionarTaller").val();
            $.get("config/precios_taller_data.php", {
                valor
            }, function(data) {
                document.getElementById("ValorTaller").value = data;
            });
        });
        $("#SeleccionarGrupo").change(function() {
            var valor = $("#SeleccionarGrupo").val();
            $.get("config/precios_grupo_data.php", {
                valor
            }, function(data) {
                document.getElementById("ValorGrupo").value = data;
            });
        });

        $(".CuerpoFormulario").hide();
        $("#SeleccionarServicio").change(function() {
            $(".CuerpoFormulario").hide();
            $("#Div_" + $(this).val()).show();
        });
    });
</script>