<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Gestión Clases</title>

<body>

    <?php include('template/navbar.php'); ?>

    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">
                        <div class="col-xl-6 d-none d-sm-block" style="height: auto; border-radius: 20px;">
                            <div class="card-body p-md-5 text-black">

                                <h3 style="font-family: Poppins-Bold;" class="mb-5 text-uppercase text-center">Registrar Clase</h3>
                                <form method="POST" action="config/register/registro_clase_config.php" id="FormularioClase">
                                    
                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Grupo:</label>
                                        <select required style="font-family: Poppins-Medium;" id="Grupo" name="Grupo" class="selectpicker form-control form-control-lg">
                                            <option value="" disabled selected>Seleccione uno</option>
                                            <?php
                                            include('config/conexion_config.php');
                                            $sql = mysqli_query($conexion, "SELECT * FROM grupo");
                                            while ($row = mysqli_fetch_array($sql)) { ?>
                                                <option value="<?php printf($row['ID_GRUPO']) ?>"><?php printf($row['NOMBRE_GRUPO']) ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Inscripción:</label>
                                        <input autocomplete="off" type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorClase" name="ValorClase" class="form-control form-control-lg" />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Fecha:</label>
                                                <span class="datepicker-toggle">
                                                    <span class="datepicker-toggle-button"></span>
                                                    <input required id="Fecha" name="Fecha" min="<?= date('Y-m-d') ?>" type="date" class="datepicker-input form-control form-control-lg">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Hora:</label>
                                                <select required style="font-family: Poppins-Medium;" id="Hora" name="Hora" class="selectpicker form-control form-control-lg">
                                                    <option value="" disabled selected>Seleccione una</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <img src="images/Clase.jpg" style="width: 68vh; height: 20vh; border-radius: 20px;" class="img-fluid">
                                    </div>
                                    <div class="d-flex justify-content-end pt-3">
                                        <input style="font-family: Poppins-Bold;" type="reset" class="btn btn-light btn-lg" value="Limpiar Formulario" />
                                        <input style="font-family: Poppins-Bold;" type="submit" class="btn btn-primary btn-lg ms-2" value="Guardar" />
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="col-xl-6" style=" margin-top: 2%; ">             
                            <table class="table" width="100%" id="TablaGrupos" style="box-shadow: 2px 2px 2px 2px lightgray;">
                               
                                <thead class="table-dark" style="font-family: Poppins-Bold;">
                                    <tr>
                                        <th style="border-top-left-radius: 20px;" scope="col">GRUPO</th>
                                        <th scope="col">VALOR</th>
                                        <th scope="col">FECHA CLASE</th>
                                        <th scope="col">HORA</th>
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
                                                <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Editar Clase</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="config/update/actualizar_clase_config.php" id="FormularioClase">
                                                <div class="modal-body">
                                                    <input type="hidden" required id="ID" name="ID" class="form-control form-control-lg" />
                                                    <div class="form-outline mb-4">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Grupo:</label>
                                                        <input autocomplete="off" type="text" style="text-transform: capitalize;" disabled required id="NombreGrupoA" name="NombreGrupoA" class="form-control form-control-lg" />
                                                    </div>
                                                    <div class="form-outline mb-4">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor:</label>
                                                        <input autocomplete="off" type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="Valor" name="Valor" class="form-control form-control-lg" />
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-4">
                                                            <div class="form-outline">
                                                                <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Fecha:</label>
                                                                <span class="datepicker-toggle">
                                                                    <span class="datepicker-toggle-button"></span>
                                                                    <input id="FechaE" name="FechaE" type="date" class="datepicker-input form-control form-control-lg">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <div class="form-outline">
                                                                <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Hora:</label>
                                                                <select required style="font-family: Poppins-Medium;" id="HoraE" name="HoraE" class="selectpicker form-control form-control-lg">
                                                                    <option disabled selected>Seleccione una</option>
                                                                </select>
                                                            </div>
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
                                                <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Eliminar Clase</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="config/delete/eliminar_clase_config.php" id="FormularioClase">
                                                <div class="modal-body">
                                                    <input type="hidden" required id="IDE" name="IDE" class="form-control form-control-lg" />
                                                    <div class="form-outline mb-4">
                                                        <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Grupo:</label>
                                                        <input type="text" disabled id="NombreD" name="NombreD" class="form-control form-control-lg" />
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-4">
                                                            <div class="form-outline">
                                                                <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Fecha:</label>
                                                                <span class="datepicker-toggle">
                                                                    <span class="datepicker-toggle-button"></span>
                                                                    <input id="FechaD" name="FechaD" type="date" disabled class="datepicker-input form-control form-control-lg">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-4">
                                                            <div class="form-outline">
                                                                <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Hora:</label>
                                                                <select required disabled style="font-family: Poppins-Medium;" id="HoraD" name="HoraD" class="selectpicker form-control form-control-lg">
                                                                    <option disabled selected>Seleccione una</option>
                                                                </select>
                                                            </div>
                                                        </div>
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
        $.getJSON('config/listar_horas_data.json', function(data) {
            $.each(data, function(key, value) {
                $("#Hora").append('<option name="' + key + '">' + value + '</option>');
                $("#HoraE").append('<option name="' + key + '">' + value + '</option>');
                $("#HoraD").append('<option name="' + key + '">' + value + '</option>');
            });
        });        
    });

    var listar = function() {
        var table = $('#TablaGrupos').DataTable({
            "ajax": {
                "method": "POST",
                "url": "config/listar_clases_data.php"
            },
            "columns": [{
                    "data": "NOMBRE_GRUPO"
                },
                {
                    "data": "VALOR"
                },
                {
                    "data": "FECHA_CLASE"
                },
                {
                    "data": "HORA"
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
        obtener_data_editar("#TablaGrupos tbody", table);
        obtener_data_eliminar("#TablaGrupos tbody", table);

    }

    var obtener_data_editar = function(tbody, table) {
        $(tbody).on("click", "button.editar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#ID").val(data.ID_CLASE),
                nombre = $("#NombreGrupoA").val(data.NOMBRE_GRUPO),
                valor = $("#Valor").val(data.VALOR),
                hora = $("#HoraE").val(data.HORA),
                fecha = $("#FechaE").val(data.FECHA_CLASE)
            console.log(data);
        });
    }

    var obtener_data_eliminar = function(tbody, table) {
        $(tbody).on("click", "button.eliminar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#IDE").val(data.ID_CLASE),
                nombre = $("#NombreD").val(data.NOMBRE_GRUPO),
                hora = $("#HoraD").val(data.HORA),
                fecha = $("#FechaD").val(data.FECHA_CLASE)
            console.log(data);
        });
    }
</script>