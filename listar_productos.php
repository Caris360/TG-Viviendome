<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Productos</title>

<body>
    <?php include('template/navbar.php'); ?>
    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">
                        <div class="card-body p-md-5 text-black" style="height: auto;">
                            <div class="col-12">
                                <table class="table" width="100%" id="TablaProductos" style="box-shadow: 2px 2px 2px 2px lightgray">
                                    <thead class="table-dark" style="font-family: Poppins-Bold">
                                        <tr>
                                            <th style="border-top-left-radius: 20px; text-align: center" scope="col">PRODUCTO</th>
                                            <th style="text-align: center" scope="col">VALOR UNITARIO</th>
                                            <th style="text-align: center" scope="col">STOCK</th>
                                            <th style="text-align: center" scope="col">COMPLEMENTO</th>
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
                                                    <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form enctype="multipart/form-data" method="POST" action="config/update/actualizar_producto_config.php" id="FormularioProducto">
                                                    <div class="modal-body">
                                                        <input type="hidden" required id="IDA" name="IDA" class="form-control form-control-lg" />
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Producto:</label>
                                                            <input type="text" required id="NombreProducto" name="NombreProducto" class="form-control form-control-lg" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Unitario:</label>
                                                            <input autocomplete="off" autofocus type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" id="ValorUnitarioA" name="ValorUnitarioA" class="form-control form-control-lg" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Stock Inicial:</label>
                                                            <input autocomplete="off" type="number" required id="StockA" name="StockA" class="form-control form-control-lg" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Complemento:</label>
                                                            <input autocomplete="off" type="text" placeholder="Nota adicional" id="ComplementoA" name="ComplementoA" class="form-control form-control-lg" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Imagen Producto:</label>
                                                            <input type="file" class='fancy-file form-control-lg' id="ImagenA" name="ImagenA" accept="image/*" multiple />
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
                                                    <h5 style="font-family: Poppins-Bold;" class="modal-title" id="exampleModalLabel">Eliminar Taller</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="config/delete/eliminar_producto_config.php" id="FormularioTaller">
                                                    <div class="modal-body">
                                                        <input type="hidden" required id="IDE" name="IDE" class="form-control form-control-lg" />
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Nombre Producto:</label>
                                                            <input type="text" disabled id="NombreProductoE" name="NombreProductoE" class="form-control form-control-lg" />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Unitario:</label>
                                                            <input autocomplete="off" type="text" disabled placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorUnitarioE" name="ValorUnitarioE" class="form-control form-control-lg" />
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
        listarTabla();

        const create = str => document.createElement(str);
        const files = document.querySelectorAll('.fancy-file');
        Array.from(files).forEach(
            f => {
                const label = create('label');
                const span_text = create('span');
                const span_name = create('span');
                const span_button = create('span');

                label.htmlFor = f.id;

                span_text.className = 'fancy-file__fancy-file-name';
                span_button.className = 'fancy-file__fancy-file-button';

                span_name.innerHTML = f.dataset.empty || 'Ningun archivo seleccionado';
                span_button.innerHTML = f.dataset.button || 'Buscar';

                label.appendChild(span_text);
                label.appendChild(span_button);
                span_text.appendChild(span_name);
                f.parentNode.appendChild(label);

                span_name.style.width = (span_text.clientWidth - 20) + 'px';

                f.addEventListener('change', e => {
                    if (f.files.length == 0) {
                        span_name.innerHTML = f.dataset.empty || 'Ningún archivo seleccionado';
                    } else if (f.files.length > 1) {
                        span_name.innerHTML = f.files.length + ' archivos seleccionados';
                    } else {
                        span_name.innerHTML = f.files[0].name;
                    }
                });
            }
        );

        $('#ValorUnitarioA').mousemove(function() {
            document.getElementById("ValorUnitarioA").focus();
            document.getElementById("ValorUnitarioA").removeAttribute('pattern');
        });

    });

    var listarTabla = function() {
        var table = $('#TablaProductos').DataTable({
            "ajax": {
                "method": "POST",
                "url": "config/listar_productos_data.php"
            },
            "columns": [{
                    "data": "NOMBRE_PRODUCTO"
                },
                {
                    "data": "VALOR_UNITARIO"
                },
                {
                    "data": "STOCK"
                },
                {
                    "data": "COMPLEMENTO"
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
        obtener_data_editar("#TablaProductos tbody", table);
        obtener_data_eliminar("#TablaProductos tbody", table);
    }

    var obtener_data_editar = function(tbody, table) {
        $(tbody).on("click", "button.editar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#IDA").val(data.ID_PRODUCTO),
                nombre = $("#NombreProducto").val(data.NOMBRE_PRODUCTO),
                valor = $("#ValorUnitarioA").val(data.VALOR_UNITARIO),
                stock = $("#StockA").val(data.STOCK),
                complemento = $("#ComplementoA").val(data.COMPLEMENTO)
            console.log(data);
        });
    }

    var obtener_data_eliminar = function(tbody, table) {
        $(tbody).on("click", "button.eliminar", function() {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#IDE").val(data.ID_PRODUCTO),
                nombre = $("#NombreProductoE").val(data.NOMBRE_PRODUCTO),
                valor = $("#ValorUnitarioE").val(data.VALOR_UNITARIO)
            console.log(data);
        });
    }
</script>