<?php
include_once('config/functions/funciones.php');
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="/config/exit_tienda.php" class="navbar-brand">
            <img src="images/Logo.PNG" height="28" alt="Viviendome">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
            <div class="navbar-nav">
                <a style="text-decoration: none;" href="/tienda_virtual.php"><span style="font-family: Poppins-Bold; ">TIENDA VIRTUAL</span></a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="/carrito.php" class="site-cart" style="text-decoration: none;">
                    <span class="icon icon-shopping_cart">
                        <strong>
                            CARRITO
                            <?php
                            $conteo = obtenerIdsDeProductosEnCarrito();
                            if ($conteo > 0) {
                                printf("(%d)", $conteo);
                            }
                            ?>&nbsp;<i class="fa fa-shopping-cart"></i>
                        </strong>
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>