<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Pagos</title>

<body>
    <?php include('template/navbar.php'); ?>
    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">
                        <div class="card-body p-md-5 text-black" style="height: 80vh;">
                            <div class="col-12">
                                <table class="table" width="100%" id="TablaPagos" style="box-shadow: 2px 2px 2px 2px lightgray">
                                    <thead class="table-dark" style="font-family: Poppins-Bold">
                                        <tr>
                                            <th style="border-top-left-radius: 20px; text-align: center" scope="col">ID CLIENTE</th>
                                            <th style="text-align: center" scope="col">GRUPO</th>
                                            <th style="text-align: center" scope="col">TALLER</th>
                                            <th style="text-align: center" scope="col">VALOR INSCRIPCIÓN</th>
                                            <th style="text-align: center" scope="col">VALOR PENDIENTE</th>
                                            <th style="border-top-right-radius: 20px; text-align: center" scope="col">DETALLE</th>
                                        </tr>
                                    </thead>

                                    <tbody style="font-family: Poppins-Medium; text-align: center">
                                        <tr class="alert">

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <div class="modal fade" id="Detalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius: 20px;">

                <div class="modal-header">
                    <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Realizar Pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="config/register/registro_pago_config.php" id="FormularioPago">
                    <div class="modal-body">
                        <input type="hidden" required id="IDInscripcionDetalle" name="IDInscripcionDetalle" class="form-control form-control-lg" />
                        <div class="form-outline mb-4">
                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Documento Cliente:</label>
                            <input type="text" readonly required id="DocumentoCliente" name="DocumentoCliente" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Tipo Servicio:</label>
                            <input type="text" readonly required id="TipoServicioDetalle" name="TipoServicioDetalle" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Original:</label>
                            <input autocomplete="off" readonly type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorOriginalDetalle" name="ValorOriginalDetalle" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Deuda:</label>
                            <input autocomplete="off" readonly type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorDeuda" name="ValorDeuda" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Método Pago:</label>
                            <select id="MetodoPagoDetalle" name="MetodoPagoDetalle" class="form-control form-control-lg" required>
                                <option selected disabled value="">Seleccione uno</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Transferencia">Transferencia</option>
                            </select>
                        </div>
                        <div class="form-outline mb-4">
                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Pago:</label>
                            <input autocomplete="off" type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorPago" name="ValorPago" class="form-control form-control-lg" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary btn-lg ms-2" data-dismiss="modal" value="Cancelar" />
                        <input type="submit" class="btn btn-success btn-lg ms-2" value="Confirmar Pago" />
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        listar();
    });
    var listar = function() {
        var table = $('#TablaPagos').DataTable({
            "ajax": {
                "method": "POST",
                "url": "config/listar_pagos_data.php"
            },
            "columns": [{
                    "data": "IDENTIFICACION_CLIENTE"
                },
                {
                    "data": "NOMBRE_GRUPO"
                },
                {
                    "data": "NOMBRE_TALLER"
                },
                {
                    "data": "VALOR_INSCRIPCION"
                },
                {
                    "data": "VALOR_PENDIENTE"
                },
                {
                    "defaultContent": "<button type='button' name='editar' id='editar' class='detalles btn btn-warning' style='font-family: Poppins-Medium;'  data-toggle='modal' data-target='#Detalles'><i class='fa fa-tags'></i> Crear Pago</button>"
                }
            ],
            responsive: true,
            dom: 'Blfrtip',
            'pageLength': 5,
            "lengthMenu": [5, 7],
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "No se ha encontrado nada",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Vacio",
                "infoFiltered": "(filtrando de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            Buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
        });
        obtener_data_pago("#TablaPagos tbody", table);
    }

    var obtener_data_pago = function(tbody, table) {
        $(tbody).on("click", "button.detalles", function() {
            $('#MetodoPagoDetalle').val('');
            var data = table.row($(this).parents("tr")).data();
            var servicio = "Grupo";
            if (data.TIPO_INSCRIPCION == 'Ta') {
                servicio = "Taller";
            }
            var id = $("#IDInscripcionDetalle").val(data.ID_INSCRIPCION),
                documento = $("#DocumentoCliente").val(data.IDENTIFICACION_CLIENTE),
                tipoServicion = $("#TipoServicioDetalle").val(servicio),
                valor = $("#ValorOriginalDetalle").val(data.VALOR_INSCRIPCION),
                valorDeuda = $("#ValorDeuda").val(data.VALOR_PENDIENTE)
            console.log(data);
        });
    }
</script>