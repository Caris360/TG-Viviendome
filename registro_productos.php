<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Registro Productos</title>

<body>

    <?php include('template/navbar.php'); ?>

    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">

                        <div class="col-xl-6" style="height: auto; border-radius: 20px;">
                            <div class="card-body p-md-5 text-black">
                                <h3 style="font-family: Poppins-Bold;" class="mb-5 text-uppercase">Registrar Producto</h3>

                                <form enctype="multipart/form-data" method="POST" action="config/register/registro_producto_config.php" id="FormularioProducto">
                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Producto:</label>
                                        <input autocomplete="off" type="text" required id="NombreProducto" name="NombreProducto" class="form-control form-control-lg" />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Valor Unitario:</label>
                                                <input autocomplete="off" type="text" placeholder="$0" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" required id="ValorUnitario" name="ValorUnitario" class="form-control form-control-lg" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Stock Inicial:</label>
                                                <input autocomplete="off" type="number" required id="Stock" name="Stock" class="form-control form-control-lg" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Complemento:</label>
                                        <input autocomplete="off" type="text" placeholder="Nota adicional" id="Complemento" name="Complemento" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label style="font-family: Poppins-Bold;" style="font-family: Poppins-Bold;" class="form-label" for="form3Example1m">Imagen Producto:</label>
                                        <input type="file" required class='fancy-file form-control-lg' id="Imagen" name="Imagen" accept="image/*" multiple />
                                    </div>
                                    <div class="d-flex justify-content-end pt-3">
                                        <input style="font-family: Poppins-Bold;" type="reset" class="btn btn-light btn-lg" value="Limpiar Formulario" />
                                        <input style="font-family: Poppins-Bold;" type="submit" class="btn btn-primary btn-lg ms-2" value="Guardar" />
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="col-xl-6 d-none d-sm-block" style="background-image: url(images/Producto.jpg); background-repeat: no-repeat; background-size: 100% 100%; background-position: center center; border-top-left-radius: 20px; border-bottom-left-radius: 20px; border-top-right-radius: 20px; border-bottom-right-radius: 20px;" class="img-fluid">
                            <!-- Espacio reservado para la imagen del lateral />-->
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
    });
</script>