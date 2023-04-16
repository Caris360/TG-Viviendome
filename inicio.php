<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Viviéndome</title>

<body>

    <?php include('template/navbar.php'); ?>

    <main>

        <header class="bg-header py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10">
                        <div class="text-center">
                            <img src="images/Viviendome.PNG" style="width: 50vh;">
                            <p style="font-family: Poppins-bold; color: #000000; border-radius: 20px; background-color: rgba(255,255,255,0.31976540616246496);" class="lead">
                                Somos un negocio enfocado en el Ser y en todo aquello que puedes lograr.
                                <br>
                                Estamos ubicadas en la localidad de medellín y buscamos que seas parte de un cambio, de un nuevo mundo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5 text-center">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h4 fw-bolder">Persona</h2>
                        <img src="images/Persona.jpg" style="width: 30vh; height: fit-content; border-radius: 20px; box-shadow: 2px 2px 5px lightgray;">
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <h2 class="h4 fw-bolder">Ser</h2>
                        <img src="images/Ser.jpg" style="width: 30vh; height: fit-content; border-radius: 20px; box-shadow: 2px 2px 5px lightgray;">
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">Espiritu</h2>
                        <img src="images/Espiritual.jpg" style="width: 30vh; height: fit-content; border-radius: 20px; box-shadow: 2px 2px 5px lightgray;">
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include('template/footer.php'); ?>

</body>

</html>