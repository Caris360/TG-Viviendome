<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Talleres</title>

<body>
    <?php include('template/navbar.php'); ?>
    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">
                        <div class="card-body p-md-5 text-black" style="height: auto;">
                            <div class="col-12">
                                <table class="table" width="100%" id="TablaTalleres" style="box-shadow: 2px 2px 2px 2px lightgray">
                                    <thead class="table-dark" style="font-family: Poppins-Bold">
                                        <tr>
                                            <th style="border-top-left-radius: 20px; text-align: center" scope="col">TALLER</th>
                                            <th style="text-align: center" scope="col">VALOR</th>
                                            <th style="text-align: center" scope="col">FECHA</th>
                                            <th style="text-align: center" scope="col">HORARIO</th>
                                            <th style="border-top-right-radius: 20px; text-align: center" scope="col">ACCIONES</th>
                                        </tr>
                                    </thead>

                                    <tbody style="font-family: Poppins-Medium; text-align: center">
                                        <tr class="alert">

                                        </tr>
                                    </tbody>

                                    <div class="modal fade" id="Actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="border-radius: 20px;">

                                                <div class="modal-header">
                                                    <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Editar Taller</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="config/update/actualizar_taller_config.php" id="FormularioTaller">
                                                    <div class="modal-body">
                                                        <input type="hidden" required id="ID" name="ID" class="form-control form-control-lg" />
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Taller:</label>
                                                            <input type="text" required id="NombreTaller" name="NombreTaller" class="form-control form-control-lg" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Inscripción:</label>
                                                            <input autocomplete="off" type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorInscripcion" name="ValorInscripcion" class="form-control form-control-lg" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <div class="form-outline">
                                                                <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Fecha:</label>
                                                                <span class="datepicker-toggle">
                                                                    <span class="datepicker-toggle-button"></span>
                                                                    <input id="FechaE" name="FechaE" type="date" class="datepicker-input form-control form-control-lg">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-secondary btn-lg ms-2" data-dismiss="modal" value="Cerrar" />
                                                        <input type="submit" style="font-family: Poppins-Bold;" class="btn btn-success btn-sm" name="enviar" value="Guardar" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="border-radius: 20px;">

                                                <div class="modal-header">
                                                    <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Eliminar Taller</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="config/delete/eliminar_taller_config.php" id="FormularioTaller">
                                                    <div class="modal-body">
                                                        <input type="hidden" required id="IDE" name="IDE" class="form-control form-control-lg" />
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Taller:</label>
                                                            <input type="text" disabled required id="NombreTallerE" name="NombreTallerE" class="form-control form-control-lg" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Inscripción:</label>
                                                            <input autocomplete="off" disabled type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorInscripcionE" name="ValorInscripcionE" class="form-control form-control-lg" />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-secondary btn-lg ms-2" data-dismiss="modal" value="Cancelar" />
                                                        <input type="submit" class="btn btn-danger btn-sm" name="enviar" value="Confirmar" />
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                </table>
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
        listar();
        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 30,
            dropdown: true,
            scrollbar: true
        });
    });

    var listar = function() {
        var table = $('#TablaTalleres').DataTable({
            "ajax": {
                "method": "POST",
                "url": "config/listar_talleres_data.php"
            },
            "columns": [{
                    "data": "NOMBRE_TALLER"
                },
                {
                    "data": "VALOR"
                },
                {
                    "data": "FECHA_TALLER"
                },
                {
                    "data": "HORA"
                },
                {
                    "defaultContent": "<button type='button' name='editar' id='editar' class='editar btn btn-success' data-toggle='modal' data-target='#Actualizar'><i class='fa fa-pencil-square-o'></i></button>&nbsp;&nbsp;<button type='button' name='eliminar' id='eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#Eliminar'><i class='fa fa-times'></i></button>"
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
        obtener_data_editar("#TablaTalleres tbody", table);
        obtener_data_eliminar("#TablaTalleres tbody", table);

    }

    var obtener_data_editar = function(tbody, table) {
        $(tbody).on("click", "button.editar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#ID").val(data.ID_TALLER),
                nombre = $("#NombreTaller").val(data.NOMBRE_TALLER),
                valor = $("#ValorInscripcion").val(data.VALOR),
                fecha = $("#FechaE").val(data.FECHA_TALLER)
            console.log(data);
        });
    }

    var obtener_data_eliminar = function(tbody, table) {
        $(tbody).on("click", "button.eliminar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#IDE").val(data.ID_TALLER),
                nombre = $("#NombreTallerE").val(data.NOMBRE_TALLER),
                valor = $("#ValorInscripcionE").val(data.VALOR)
            console.log(data);
        });
    }
</script>