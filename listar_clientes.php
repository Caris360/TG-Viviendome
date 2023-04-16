<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Clientes</title>

<body>

    <?php include('template/navbar.php'); ?>

    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">
                        <div class="card-body p-md-5 text-black" style="height: 80vh;">

                            <div class="col-12">
                                <table class="table" id="TablaClientes" style="box-shadow: 2px 2px 2px 2px lightgray;">

                                    <thead class="table-dark" style="font-family: Poppins-Bold;">
                                        <tr>
                                            <th style="border-top-left-radius: 20px;" scope="col">TIPO DOCUMENTO</th>
                                            <th scope="col">IDENTIFICACION</th>
                                            <th scope="col">NOMBRE</th>
                                            <th scope="col">DIRECCION</th>
                                            <th scope="col">CONTACTO</th>
                                            <th scope="col">CORREO</th>
                                            <th style="border-top-right-radius: 20px;" scope="col">ACCIONES</th>
                                        </tr>
                                    </thead>

                                    <tbody style="font-family: Poppins-Medium; text-align: left;">
                                        <tr class="alert">
                                        </tr>
                                    </tbody>

                                    <div class="modal fade" id="Actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="border-radius: 20px;">

                                                <div class="modal-header">
                                                    <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form method="POST" action="config/update/actualizar_cliente_config.php" id="FormularioCliente">
                                                    <div class="modal-body">

                                                        <input type="hidden" required id="Documento" name="Documento" class="form-control form-control-lg" />

                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre:</label>
                                                            <input type="text" style="text-transform: capitalize;" required id="NombreCliente" name="NombreCliente" class="form-control form-control-lg" />
                                                        </div>

                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Dirección:</label>
                                                            <input type="text" required id="Direccion" name="Direccion" class="form-control form-control-lg" />
                                                        </div>

                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example9">Contacto:</label>
                                                            <input type="text" required id="Contacto" name="Contacto" class="form-control form-control-lg" />
                                                        </div>

                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example90">Correo:</label>
                                                            <input type="text" required id="Correo" name="Correo" class="form-control form-control-lg" />
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-secondary btn-lg ms-2" data-dismiss="modal" value="Cerrar" />
                                                        <input type="submit" class="btn btn-primary btn-sm" name="enviar" value="Guardar" />
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="border-radius: 20px;">

                                                <div class="modal-header">
                                                    <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form method="POST" action="config/delete/eliminar_cliente_config.php" id="FormularioCliente">
                                                    <div class="modal-body">

                                                        <input type="hidden" required id="DocumentoE" name="DocumentoE" class="form-control form-control-lg" />

                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Documento:</label>
                                                            <input type="text" disabled id="DocumentoS" name="DocumentoS" class="form-control form-control-lg" />
                                                        </div>

                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre:</label>
                                                            <input type="text" disabled required id="NombreClienteE" name="NombreClienteE" class="form-control form-control-lg" />
                                                        </div>

                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example90">Correo:</label>
                                                            <input type="text" disabled required id="CorreoE" name="CorreoE" class="form-control form-control-lg" />
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
    });

    var listar = function() {
        var table = $('#TablaClientes').DataTable({
            "ajax": {
                "method": "POST",
                "url": "config/listar_clientes_data.php"
            },
            "columns": [{
                    "data": "TIPO_DOCUMENTO"
                },
                {
                    "data": "IDENTIFICACION_CLIENTE"
                },
                {
                    "data": "NOMBRE_PUBLICO"
                },
                {
                    "data": "DIRECCION"
                },
                {
                    "data": "NUMERO_CONTACTO"
                },
                {
                    "data": "CORREO"
                },
                {
                    "defaultContent": "<button type='button' name='editar' id='editar' class='editar btn btn-success' data-toggle='modal' data-target='#Actualizar'><i class='fa fa-pencil-square-o'></i></button>&nbsp;&nbsp;<button type='button' name='eliminar' id='eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#Eliminar'><i class='fa fa-times'></i></button>"
                }

            ],
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
        obtener_data_editar("#TablaClientes tbody", table);
        obtener_data_eliminar("#TablaClientes tbody", table);

    }

    var obtener_data_editar = function(tbody, table) {
        $(tbody).on("click", "button.editar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#Documento").val(data.IDENTIFICACION_CLIENTE),
                nombre = $("#NombreCliente").val(data.NOMBRE_PUBLICO),
                direccion = $("#Direccion").val(data.DIRECCION),
                contacto = $("#Contacto").val(data.NUMERO_CONTACTO),
                correo = $("#Correo").val(data.CORREO);
            console.log(data);
        });
    }

    var obtener_data_eliminar = function(tbody, table) {
        $(tbody).on("click", "button.eliminar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#DocumentoE").val(data.IDENTIFICACION_CLIENTE),
                nombre = $("#NombreClienteE").val(data.NOMBRE_PUBLICO),
                documento = $("#DocumentoS").val(data.IDENTIFICACION_CLIENTE),
                correo = $("#CorreoE").val(data.CORREO);
            console.log(data);
        });
    }
</script>