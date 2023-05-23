<?php
session_start();
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

    <section style="background-color: #eee;">
        <div class="text-center container py-5">
            <h4 class="mt-4 mb-5"><strong>CATALOGO PRODUCTOS</strong></h4>
            <div class="row">
                <div class="col-xl-12">
                    <div class="row justify-content-center">
                        <?php
                        include('config/conexion_config.php');
                        $sql = mysqli_query($conexion, "SELECT * FROM PRODUCTO");
                        while ($row = mysqli_fetch_array($sql)) { ?>
                            <div class="col-lg-4 col-md-4 mb-4">
                                <div class="card">
                                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                        <?php printf('<img  width=300 height=300 src="data:image/*;base64,' . base64_encode($row['IMAGEN']) . ' "/>') ?>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-3"><?php printf($row['NOMBRE_PRODUCTO']) ?></h5>
                                        <p><?php printf($row['COMPLEMENTO']) ?></p>
                                        <h6 class="mb-3">$ <?php printf($row['VALOR_UNITARIO']) ?></h6>
                                        <form action="/config/functions/agregar_carrito.php" method="post">
                                            <input type="hidden" name="id_producto" value="<?php printf($row['ID_PRODUCTO']) ?>">
                                            <button class="btn btn-outline-primary btn-lg py-3 btn-block form-control">
                                                Agregar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>