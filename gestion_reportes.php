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
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Selecciona el tipo:</label>
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

                                    <div class="col-md-4 mb-2" id="LabelInscripciones">
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
                                    <div class="col-md-2 mb-2" id="LabelReporteInscripcion">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Obtener Reporte:</label>
                                            <button style="font-family: Poppins-Bold; " id="ReporteInscripcion" name="ReporteInscripcion" class="btn btn-primary form-control">Generar</button>
                                        </div>
                                    </div>

                                    <div class="col-md-2 mb-2" id="LabelPagos">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Selecciona el tipo:</label>
                                            <select required id="SeleccionPagos" name="SeleccionPagos" class="form-control form-control-lg">
                                                <option value="0" selected disabled>Seleccione uno</option>
                                                <option value="1">Clientes</option>
                                                <option value="2">Rango Fechas</option>
                                                <option value="3">Totalidad</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-2" id="LabelClientes">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Cliente:</label>
                                            <select required id="SeleccionCliente" name="SeleccionCliente" class="form-control form-control-lg">
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
                                    <div class="col-md-2 mb-2" id="LabelFechaInicio">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Fecha inicio:</label>
                                            <span class="datepicker-toggle">
                                                <span class="datepicker-toggle-button"></span>
                                                <input required id="FechaInicio" name="FechaInicio" max="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>" type="date" class="datepicker-input form-control form-control-lg">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2" id="LabelFechaFin">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Fecha fin:</label>
                                            <span class="datepicker-toggle">
                                                <span class="datepicker-toggle-button"></span>
                                                <input required id="FechaFin" name="FechaFin" max="<?= date('Y-m-d') ?>" value="<?= date('Y-m-d') ?>" type="date" class="datepicker-input form-control form-control-lg">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-2" id="LabelReportePagos">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Obtener Reporte:</label>
                                            <button style="font-family: Poppins-Bold; " id="ReportePagos" name="ReportePagos" class="btn btn-primary form-control">Generar</button>
                                        </div>
                                    </div>

                                </div>

                                <br></br>

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
                        ocultarTablas();
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
                $("#LabelInscripciones").show();
                $("#SeleccionInscripcion").show();
                $("#SeleccionInscripcion").val('0');

                $("#SeleccionInscripcion").change(function() {
                    var valor = $('#SeleccionInscripcion').val();
                    $("#LabelReporteInscripcion").show();
                    $("#ReporteInscripcion").show();
                    ocultarTablas();

                    $('#ReporteInscripcion').click(function() {
                        ocultarTablas();
                        if (valor == "1") {
                            $('#Div_tbInscripcionesPagas').show();
                            TablaInscripcionPaga('#ReporteInscripcionesPagas', valor);
                        }
                        if (valor == "2") {
                            $('#Div_tbInscripcionesDeuda').show();
                            TablaInscripcionDebe('#ReporteInscripcionesDeuda', valor);
                        }
                        if (valor == "3") {
                            $('#Div_tbInscripciones').show();
                            TablaInscripcion('#ReporteInscripciones', valor);
                        }
                    });

                });

            }
            if (opcionReporte == "3") {
                ocultarComponentes();
                ocultarTablas();
                $("#LabelPagos").show();
                $("#SeleccionPagos").show();
                $("#SeleccionPagos").val('0');

                $("#SeleccionPagos").change(function() {
                    var opcionP = $('#SeleccionPagos').val();
                    ocultarTablas();

                    var cedulaCliente, fechaInicio, fechafin;

                    if (opcionP == "1") {
                        ocultarComponentes();
                        $("#LabelPagos").show();
                        $("#SeleccionPagos").show();
                        $("#LabelClientes").show();
                        $("#SeleccionCliente").show();

                        $("#SeleccionCliente").change(function() {
                            cedulaCliente = $('#SeleccionCliente').val();
                            $("#LabelReportePagos").show();
                            $("#ReportePagos").show();
                        });
                    }
                    if (opcionP == "2") {
                        ocultarComponentes();
                        $("#LabelPagos").show();
                        $("#SeleccionPagos").show();
                        $("#LabelFechaInicio").show();
                        $("#FechaInicio").show();
                        $("#LabelFechaFin").show();
                        $("#FechaFin").show();
                        $("#LabelReportePagos").show();
                        $("#ReportePagos").show();
                        fechaInicio = $('#FechaInicio').val();
                        fechafin = $('#FechaFin').val();

                        $("#FechaInicio").change(function() {
                            fechaInicio = $('#FechaInicio').val();
                            $('#Div_tbPagosFechas').hide();
                            if (fechaInicio > fechafin) {
                                alert('Valida las fechas seleccionadas!');
                            }
                        });

                        $("#FechaFin").change(function() {
                            fechafin = $('#FechaFin').val();
                            $('#Div_tbPagosFechas').hide();
                            if (fechaInicio > fechafin) {
                                alert('Valida las fechas seleccionadas!');
                            }
                        });
                    }
                    if (opcionP == "3") {
                        ocultarComponentes();
                        $("#LabelPagos").show();
                        $("#SeleccionPagos").show();
                        $("#LabelReportePagos").show();
                    }

                    $("#ReportePagos").click(function() {
                        ocultarTablas()
                        if (opcionP == "1") {
                            $('#Div_tbPagosCliente').show();
                            TablaPagoClientes('#ReportePagosCliente', cedulaCliente);
                        }
                        if (opcionP == "2") {
                            fechaInicio = $('#FechaInicio').val();
                            fechafin = $('#FechaFin').val();
                            if (fechaInicio > fechafin) {
                                alert('Valida las fechas seleccionadas!');
                            } else {
                                $('#Div_tbPagosFechas').show();
                                TablaPagoFechas('#ReportePagosFechas', fechaInicio, fechafin);
                                alert('Fechas seleccionadas: ' + fechaInicio + " - " + fechafin);
                            }
                        }
                        if (opcionP == "3") {
                            $('#Div_tbPagos').show();
                            TablaPagos('#ReportePagos');
                        }
                    });

                });
            }

        });

    });

    function ocultarComponentes() {
        $("#LabelSeleccionServicio").hide();
        $('#LabelReporteGeneral').hide();

        $("#LabelInscripciones").hide();
        $("#SeleccionInscripcion").hide();
        $('#LabelReporteInscripcion').hide();

        $("#LabelPagos").hide();
        $("#SeleccionPagos").hide();
        $("#LabelClientes").hide();
        $("#SeleccionCliente").hide();
        $("#LabelFechaInicio").hide();
        $("#FechaInicio").hide();
        $("#LabelFechaFin").hide();
        $("#FechaFin").hide();
        $("#LabelReportePagos").hide();
    }

    function ocultarTablas() {
        $("#Div_tbCliente").hide();
        $("#Div_tbAcademina").hide();
        $('#Div_tbGrupo').hide();
        $('#Div_tbClase').hide();
        $('#Div_tbTaller').hide();
        $('#Div_tbProducto').hide();
        $('#Div_tbInscripciones').hide();
        $('#Div_tbInscripcionesPagas').hide();
        $('#Div_tbInscripcionesDeuda').hide();
        $('#Div_tbPagosCliente').hide();
        $('#Div_tbPagosFechas').hide();
        $('#Div_tbPagos').hide();
    }
</script>