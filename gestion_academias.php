<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Gestión Academias</title>

<body>

    <?php include('template/navbar.php'); ?>

    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">

                        <div class="col-xl-6 d-none d-sm-block" style="height: 82vh; border-radius: 20px;">
                            <div class="card-body p-md-5 text-black">
                                <h3 style="font-family: Poppins-Bold;" class="mb-5 text-uppercase text-center">Registrar Academia</h3>
                                <form method="POST" action="config/register/registro_academia_config.php" id="FormularioAcademia">

                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Academia:</label>
                                        <input type="text" style="text-transform: capitalize;" required id="NombreAcademia" name="NombreAcademia" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <img src="images/Academia.jpg" style="width: 68vh; height: 40vh; border-radius: 20px; ">
                                    </div>


                                    <div class="d-flex justify-content-end pt-3">
                                        <input style="font-family: Poppins-Bold;" type="reset" class="btn btn-light btn-lg" value="Limpiar Formulario" />
                                        <input style="font-family: Poppins-Bold;" type="submit" class="btn btn-primary btn-lg ms-2" value="Guardar" />
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-xl-6" style=" margin-top: 2%; ">

                            <table class="table" width="100%" id="TablaAcademia" style="box-shadow: 2px 2px 2px 2px lightgray;">
                                <thead class="table-dark" style="font-family: Poppins-Bold;">
                                    <tr>
                                        <th style="border-top-left-radius: 20px;" scope="col">NOMBRE ACADEMIA</th>
                                        <th scope="col">CANTIDAD GRUPOS</th>
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
                                                <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Editar Academia</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="config/update/actualizar_academia_config.php" id="FormularioAcademia">
                                                <div class="modal-body">
                                                    <input type="hidden" required id="ID" name="ID" class="form-control form-control-lg" />
                                                    <div class="form-outline mb-4">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Academia:</label>
                                                        <input type="text" required id="NombreAcademiaE" name="NombreAcademiaE" class="form-control form-control-lg" />
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
                                                <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Eliminar Academia</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="config/delete/eliminar_academia_config.php" id="FormularioAcademia">
                                                <div class="modal-body">
                                                    <input type="hidden" required id="IDE" name="IDE" class="form-control form-control-lg" />
                                                    <div class="form-outline mb-4">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Academia:</label>
                                                        <input type="text" disabled id="NombreA" name="NombreA" class="form-control form-control-lg" />
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-secondary btn-lg ms-2" data-dismiss="modal" value="Cancelar" />
                                                    <input type="submit" style="font-family: Poppins-Bold;" class="btn btn-danger btn-sm" name="enviar" value="Confirmar" />
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

    </section>

</body>

</html>

<script>
    $(document).ready(function() {
        listar();
    });

    var listar = function() {
        var table = $('#TablaAcademia').DataTable({
            "ajax": {
                "method": "POST",
                "url": "config/listar_academias_data.php"
            },
            "columns": [{
                    "data": "NOMBRE_ACADEMIA"
                },
                {
                    "data": "CANTIDAD_GRUPOS"
                },
                {
                    "defaultContent": "<button type='button' name='editar' id='editar' class='editar btn btn-success' data-toggle='modal' data-target='#Actualizar'><i class='fa fa-pencil-square-o'></i></button>&nbsp;&nbsp;<button type='button' name='eliminar' id='eliminar' class='eliminar btn btn-danger' data-toggle='modal' data-target='#Eliminar'><i class='fa fa-times'></i></button>"
                }

            ],
            responsive: true,
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
        obtener_data_editar("#TablaAcademia tbody", table);
        obtener_data_eliminar("#TablaAcademia tbody", table);

    }

    var obtener_data_editar = function(tbody, table) {
        $(tbody).on("click", "button.editar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#ID").val(data.ID_ACADEMIA),
                nombre = $("#NombreAcademiaE").val(data.NOMBRE_ACADEMIA)
            console.log(data);
        });
    }

    var obtener_data_eliminar = function(tbody, table) {
        $(tbody).on("click", "button.eliminar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#IDE").val(data.ID_ACADEMIA),
                nombre = $("#NombreA").val(data.NOMBRE_ACADEMIA)
            console.log(data);
        });
    }
</script>