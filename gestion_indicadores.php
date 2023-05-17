<?php
include('config/conexion_config.php');
session_start();
if (!isset($_SESSION['UsuarioActivo'])) {
    header('location: /login.php');
}
?>

<html>

<?php include('template/head.php') ?>
<title>Indicadores</title>

<body>

    <?php include('template/navbar.php'); ?>
    <section class="h-80">

        <div class="row d-flex justify-content-center align-items-center h-80" style="width: 80%; margin-left: 10%; border-radius: 20px;">
            <div class="row">
                <div class="card card-registration my-2" style=" border-radius: 20px;">
                    <div class="row g-0">
                        <div class="col-xl-6 d-none d-sm-block" style="height: 82vh; border-radius: 20px;">
                            <div class="card-body p-md-5 text-black">
                                <div class="accordion accordion-flush" id="accordionFlushExample">

                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                Academias
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="card-header">Prueba grafico</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <button class="btn btn-primary" id="graficoUno" name="graficoUno">Grafico Bar</button>
                                                        <canvas id="myChart" width="500" height="500"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Accordion Item #2
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="card">
                                                <div class="card-header">Hola que hace?</div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <button class="btn btn-primary" onclick="CargarDatos()">Grafico Bar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                Accordion Item #3
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-xl-6" style=" margin-top: 2%; ">


                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

</body>

</html>

<script>
    $('#graficoUno').click(function() {
        pruebaGrafica();
    });

    function pruebaGrafica() {
        $.ajax({
            'url': 'config/grafico_academias.php',
            'type': 'POST'
        }).done(function(resp) {
            var titulos = [];
            var valores = [];
            var data = JSON.parse(resp);
            for (var i = 0; i < data.length; i++) {
                titulos.push(data[i][1]);
                valores.push(data[i][2]);
            }
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: titulos,
                    datasets: [{
                        label: '# of Votes',
                        data: valores,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
    }
</script>