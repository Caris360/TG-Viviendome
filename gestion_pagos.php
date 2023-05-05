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
                                            <th style="text-align: center" scope="col">VALOR CLASES</th>
                                            <th style="border-top-right-radius: 20px; text-align: center" scope="col">ESTADO</th>
                                        </tr>
                                    </thead>

                                    <tbody style="font-family: Poppins-Medium; text-align: center">
                                        <tr class="alert">

                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row" style="margin-top: 2%;">
                                    <div class="col-md-3 mb-4">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Cliente:</label>
                                            <select id="seleccionarCliente" class="js-example-basic-single form-control form-control-lg">
                                                <option selected disabled>Seleccione uno</option>
                                                <?php
                                                include('config/conexion_config.php');
                                                $sql = mysqli_query($conexion, "SELECT I.IDENTIFICACION_CLIENTE, C.NOMBRE_PUBLICO FROM inscripciones I INNER JOIN CLIENTE C ON C.IDENTIFICACION_CLIENTE = I.IDENTIFICACION_CLIENTE AND ESTADO_INSCRIPCION = 'Debe' GROUP BY I.IDENTIFICACION_CLIENTE, C.NOMBRE_PUBLICO");
                                                while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <option value="<?php printf($row['IDENTIFICACION_CLIENTE']) ?>"><?php printf($row['NOMBRE_PUBLICO']) ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <div class="form-outline">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example1n">Número Documento:</label>
                                            <input type="text" readonly required id="Documento" name="Documento" class="form-control form-control-lg" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Seleccione Tipo Servicio:</label>
                                                    <select id="SeleccionarInscripcion" name="SeleccionarInscripcion" class="form-control form-control-lg" disabled>
                                                        <option selected disabled>Seleccione uno</option>
                                                        <option value="1">Taller</option>
                                                        <option value="2">Grupo</option>
                                                        <option value="3">Clase</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div id="Servicios" name="Servicios" class="form-outline"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="CuerpoFormulario" id="Div_1">
                                    <div class="d-flex justify-content-end pt-3">
                                        <button id="Pagar" onclick="CargarPago()" name="Pagar" data-toggle='modal' data-target='#Pagos' style="font-family: Poppins-Bold;" type="submit" class="btn btn-primary btn-lg ms-2 pago">Pagar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <div class="modal fade" id="Pagos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="hidden" required id="Documento" name="Documento" class="form-control form-control-lg" />
                        <input type="hidden" required id="Servicio" name="Servicio" class="form-control form-control-lg" />
                        <div class="form-outline mb-4">
                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Cliente:</label>
                            <input type="text" readonly required id="NombreCliente" name="NombreCliente" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Tipo Servicio:</label>
                            <input type="text" readonly required id="TipoServicio" name="TipoServicio" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Original:</label>
                            <input autocomplete="off" readonly type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorOriginal" name="ValorOriginal" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-4">
                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Método Pago:</label>
                            <select id="MetodoPago" name="MetodoPago" class="form-control form-control-lg" required>
                                <option selected disabled>Seleccione uno</option>
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
        CargarLista();
        CargarPago();
        $("#seleccionarCliente").change(function() {
            var x = $('#seleccionarCliente').val();
            $('#Documento').val(x);
            $("#SeleccionarInscripcion").removeAttr('disabled');
        });
        $("#SeleccionarInscripcion").change(function() {
            CargarLista();
        });

    });

    function CargarLista() {
        $.ajax({
            type: 'POST',
            url: 'config/listar_pagos_id_data.php',
            data: {
                'IDCliente': $('#seleccionarCliente').val(),
                'TipoInscripcion': $('#SeleccionarInscripcion').val()
            },
            success: function(r) {
                $('#Servicios').html(r);
                $(".CuerpoFormulario").hide();
                $("#SeleccionarServicio").change(function() {
                    $(".CuerpoFormulario").hide();
                    $("#Div_1").show();
                });
            }
        });
    }

    function CargarPago() {
        $('#NombreCliente').val($("#seleccionarCliente option:selected").text());
        $('#TipoServicio').val($("#SeleccionarInscripcion option:selected").text());
        $('#ValorOriginal').val($("#SeleccionarServicio option:selected").text());
        $('#Documento').val($("#seleccionarCliente").val());
        $('#Servicio').val($("#SeleccionarServicio").val());
    }

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
                    "data": "VALOR_CLASES"
                },
                {
                    "data": "ESTADO_INSCRIPCION"
                }
            ],
            responsive: true,
            dom: 'Blfrtip',
            'pageLength': 4,
            "lengthMenu": [4, 5],
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
    }

    var obtener_data_pago = function(tbody, table) {
        $(tbody).on("click", "button.eliminar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#IDE").val(data.ID_TALLER),
                nombre = $("#NombreTallerE").val(data.NOMBRE_TALLER),
                valor = $("#ValorInscripcionE").val(data.VALOR)
            console.log(data);
        });
    }

    /* paypal.Buttons({
         style: {
             color: 'blue',
             shape: 'pill',
             label: 'pay'
         },
         createOrder: function(data, actions) {
             return actions.order.create({
                 purchase_units: [{
                     amount: {
                         value: $("#SeleccionarServicio option:selected").text()
                     }
                 }]
             });
         },

         onApprove: function(data, actions) {
             return actions.order.capture().then(function(orderData) {
                 console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                 var transaction = orderData.purchase_units[0].payments.captures[0];
                 alert('¡GRACIAS POR TU COMPRA!');
                 window.location.href = '/gestion_pagos.php';
                 const element = document.getElementById('paypal-button-container');
             });

         }


     }).render('#paypal-button-container');*/
</script>