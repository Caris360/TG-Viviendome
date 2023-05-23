<?php

session_start();
include('config/functions/funciones.php');

?>


<!DOCTYPE html>

<head>
    <link rel="icon" href="images/Logo.PNG" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://www.paypal.com/sdk/js?client-id=AdIiK454e_3O5TmXG5Iwwp1at0nkNjCsJ-e83QQW2erKzwPQzOLFRl1ZJOjNHwcYEdsordr5mxdhC3Zr"></script>
    <!--jQuery library file -->
    <link rel="stylesheet" href="css/storestyles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>

<title>Tienda Virtual</title>

<body>

    <?php include('template/navbar_store.php'); ?>
    <div class="site-wrap">

        <div class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <form class="col-md-12" method="post">
                        <div class="site-blocks-table">
                            <?php

                            $productos = obtenerProductosEnCarrito();
                            if (count($productos) == 0) {
                            ?>
                                <section class="hero is-info">
                                    <div class="hero-body">
                                        <div class="container">
                                            <h1 class="title">
                                                Todavía no hay productos
                                            </h1>
                                            <h2 class="subtitle">
                                                Visita la tienda para agregar productos a tu carrito
                                            </h2>

                                        </div>
                                    </div>
                                    <br><br><br><br><br><br>
                                </section>
                            <?php } else { ?>
                                <div class="columns">
                                    <div class="column">
                                        <h2 class="is-size-2">Mi carrito de compras</h2>
                                        <table class="table table-bordered">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Imagen</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio</th>
                                                    <th>Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include('config/conexion_config.php');
                                                $total = 0;
                                                $idSesion = session_id();
                                                $sql = mysqli_query($conexion, "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, IMAGEN, VALOR_UNITARIO, CANTIDAD, PRODUCTO_ID FROM PRODUCTO INNER JOIN CARRITO ON PRODUCTO.ID_PRODUCTO = CARRITO.PRODUCTO_ID WHERE CARRITO.ID_SESION = '$idSesion'");
                                                $row = array();
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    $rows[] = $row;
                                                }
                                                foreach ($rows as $productos) {
                                                    $total += $productos['VALOR_UNITARIO'];
                                                ?>

                                                    <tr>
                                                        <td><?php echo $productos['NOMBRE_PRODUCTO'] ?></td>
                                                        <td class="product-thumbnail"><?php printf('<center><img  width=300 height=300 src="data:image/jpeg;base64,' . base64_encode($productos['IMAGEN']) . ' "/></center>') ?></td>
                                                        <td><?php echo $productos['CANTIDAD'] ?></td>
                                                        <td>$<?php echo number_format($productos['VALOR_UNITARIO'], 2) ?></td>
                                                        <td>
                                                            <form action="config/functions/eliminar_del_carrito.php" method="post">
                                                                <input type="hidden" name="id_producto" value="<?php echo $productos['PRODUCTO_ID'] ?>">
                                                                <input type="hidden" name="redireccionar_carrito">
                                                                <button class="btn btn-primary btn-sm">
                                                                    x
                                                                </button>
                                                            </form>
                                                        </td>
                                                    <?php } ?>
                                                    </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                                                    <td colspan="2" class="is-size-4">
                                                        $<?php echo number_format($total, 2) ?>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>

                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Costo total</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Subtotal</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">$<?php echo number_format($total, 2) ?></strong>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">$<?php echo number_format($total, 2) ?></strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div id="paypal-button-container" class="col-md-12"></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        paypal.Buttons({

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total ?>'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {

                return actions.order.capture().then(function(orderData) {
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    alert('¡GRACIAS POR TU COMPRA!');
                    window.location.href = 'eliminar_del_carrito copy.php';
                    const element = document.getElementById('paypal-button-container');
                });

            }


        }).render('#paypal-button-container');
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>