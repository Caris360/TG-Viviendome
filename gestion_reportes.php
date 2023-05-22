<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Reportes</title>

<body>

    <?php include('template/navbar.php'); ?>
    <section class="h-80">


        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style="height: auto; border-radius: 20px;">
                    <div class="row g-0">

                        <div class="col-xl-12 d-none d-sm-block" style="height: auto; border-radius: 20px;">
                            <div class="card-body p-md-5 text-black">
                                <h3 style="font-family: Poppins-Bold;" class="mb-5 text-uppercase">Generar Reportes</h3>

                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Selecciona un reporte a generar de:</label>
                                            <select required id="OpcionReporte" name="OpcionReporte" class="form-control form-control-lg">
                                                <option selected disabled>Seleccione uno</option>
                                                <option value="1">Generales</option>
                                                <option value="2">Inscripciones</option>
                                                <option value="3">Pagos</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-2" id="LabelSeleccionServicio">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Selecciona reporte de:</label>
                                            <select required id="SeleccionServicio" name="SeleccionServicio" class="form-control form-control-lg">
                                                <option value="0" selected disabled>Seleccione uno</option>
                                                <option value="1">Clientes</option>
                                                <option value="2">Academias</option>
                                                <option value="3">Grupos</option>
                                                <option value="4">Clases</option>
                                                <option value="5">Talleres</option>
                                                <option value="6">Productos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2" id="LabelReporteGeneral">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Obtener Reporte:</label>
                                            <button style="font-family: Poppins-Bold; " id="ReporteGeneral" name="ReporteGeneral" class="btn btn-primary form-control">Generar</button>
                                        </div>
                                    </div>
                                </div>

                                <br></br>

                                <div class="CuerpoOpcionesReporte" id="Div_2">
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-outline">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Selecciona el tipo:</label>
                                                        <select required id="SeleccionInscripcion" name="SeleccionInscripcion" class="form-control form-control-lg">
                                                            <option value="0" selected disabled>Seleccione uno</option>
                                                            <option value="1">Pagadas</option>
                                                            <option value="2">En deuda</option>
                                                            <option value="3">Totalidad</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--<div class="col-md-4 mb-2">
                                                    <div class="form-outline">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Aplicar para:</label>
                                                        <select required id="SeleccionTipoInscripcion" name="SeleccionTipoInscripcion" class="form-control form-control-lg">
                                                            <option value="0" selected disabled>Seleccione uno</option>
                                                            <option value="1">Grupos</option>
                                                            <option value="2">Talleres</option>
                                                            <option value="3">Ambos</option>
                                                        </select>
                                                    </div>
                                                </div>-->
                                                <div class="col-md-2 mb-2" id="LabelReporteInscripcion">
                                                    <div class="form-outline">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Obtener Reporte:</label>
                                                        <button style="font-family: Poppins-Bold; " id="ReporteInscripcion" name="ReporteInscripcion" class="btn btn-primary form-control">Generar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php include('template/report_tables.php'); ?>

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

        ocultarComponentes();
        ocultarTablas();


        $("#OpcionReporte").change(function() {

            var opcionReporte = $('#OpcionReporte').val();

            if (opcionReporte == "1") {
                ocultarComponentes();
                ocultarTablas();
                $("#LabelSeleccionServicio").show();
                $("#SeleccionServicio").show();
                $("#SeleccionServicio").val('0');

                $("#SeleccionServicio").change(function() {
                    var opcionGeneral = $('#SeleccionServicio').val();
                    $("#LabelReporteGeneral").show();
                    $("#ReporteGeneral").show();
                    ocultarTablas();

                    $('#ReporteGeneral').click(function() {
                        if (opcionGeneral == "1") {
                            $("#Div_tbCliente").show();
                            TablaClientes('#ReporteClientes');
                        }
                        if (opcionGeneral == "2") {
                            $("#Div_tbAcademina").show();
                            TablaAcademias('#ReporteAcademias');
                        }
                        if (opcionGeneral == "3") {
                            $('#Div_tbGrupo').show();
                            TablaGrupos('#ReporteGrupos');
                        }
                        if (opcionGeneral == "4") {
                            $('#Div_tbClase').show();
                            TablaClases('#ReporteClases');
                        }
                        if (opcionGeneral == "5") {
                            $('#Div_tbTaller').show();
                            TablaTalleres('#ReporteTalleres');
                        }
                        if (opcionGeneral == "6") {
                            $('#Div_tbProducto').show();
                            TablaProductos('#ReporteProductos');
                        }
                    });

                });

            }
            if (opcionReporte == "2") {
                ocultarComponentes();
                ocultarTablas();
                $("#Div_2").show();
                $("#SeleccionInscripcion").show();

                $("#SeleccionInscripcion").change(function() {
                    var opcionInscripcion = $('#SeleccionInscripcion').val();
                    $("#LabelReporteInscripcion").show();
                    ocultarTablas();

                    $('#ReporteInscripcion').click(function() {
                        $('#Div_tbInscripcionPaga').show();
                        TablaInscripcionPaga('#ReporteInscripcionPaga', opcionInscripcion);
                    });

                });

            }
            if (opcionReporte == "3") {

                ocultarComponentes();
                ocultarTablas();

                $("#Div_3").show();
            }

        });

    });

    function ocultarComponentes() {
        $("#LabelSeleccionServicio").hide();
        $('#LabelReporteGeneral').hide();
        $("#Div_2").hide();
        $("#Div_3").hide();
        $("#SeleccionInscripcion").hide();
        $('#LabelReporteInscripcion').hide();
    }

    function ocultarTablas() {
        $("#Div_tbCliente").hide();
        $("#Div_tbAcademina").hide();
        $('#Div_tbGrupo').hide();
        $('#Div_tbClase').hide();
        $('#Div_tbTaller').hide();
        $('#Div_tbProducto').hide();
        $('#Div_tbInscripcionPaga').hide();
    }
</script>