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
                    <div class="row">

                        <div class="col-xl-12" style=" margin-top: 2%; ">
                            <h3 style="font-family: Poppins-Bold;" class="mb-5 text-uppercase text-center">Graficas de indicadores</h3>
                        </div>

                        <div class="col-xl-12 d-none d-sm-block" style="height: auto; border-radius: 20px;">
                            <div class="row">
                                <div class="card col-md-1 mb-4">
                                </div>
                                <div class="card col-md-5 mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family: Poppins-Bold; text-align: center;">Indicador de Academias con más grupos</h5>
                                        <canvas id="chartAcademias" width="500" height="500"></canvas>
                                    </div>
                                    <!--<div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label style="font-family: Poppins-Bold;" class="form-label" for="form3Example8">Filtro cantidad:</label>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <select required id="cantidadAcademias" name="cantidadAcademias" class="form-control" style="text-align: center;">
                                                <option selected disabled>Seleccionar:</option>
                                                <option value="2">5</option>
                                                <option value="3">7</option>
                                                <option value="4">9</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <button style="font-family: Poppins-Bold; " id="botonAcademias" name="botonAcademias" class="btn btn-primary form-control">Generar</button>
                                        </div>
                                    </div>-->
                                </div>

                                <div class="card col-md-5 mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-family: Poppins-Bold; text-align: center;">Indicador de inscripciones a servicios</h5>
                                        <canvas id="myChart" width="500" height="500"></canvas>
                                    </div>
                                    <!--<div class="row">
                                        <div class="col-md-6 mb-2">
                                            <select required id="cantidadPersonas" name="cantidadPersonas" class="form-control ">
                                                <option selected disabled>Selecciona una cantidad</option>
                                                <option value="5">5</option>
                                                <option value="7">7</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                        <button style="font-family: Poppins-Bold; " id="botonAcademias" name="botonAcademias" class="btn btn-primary form-control">Generar</button>
                                        </div>
                                    </div>-->
                                </div>
                                <div class="card col-md-1 mb-4">
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
    $(document).ready(function() {

        graficoAcademias();

        graficoInscritos();

        $('#botonAcademias').click(function() {
            var opcionFiltro = $('#cantidadAcademias').val();
            alert('Cantidad: ' + opcionFiltro);
            graficoAcademias();
        });

    });

    function graficoAcademias() {
        $.ajax({
            'type': 'POST',
            //'data': {'cantidad': cantidadAcademias},
            'url': 'config/grafico_academias.php'
        }).done(function(resp) {
            var titulos = [];
            var valores = [];
            var data = JSON.parse(resp);
            for (var i = 0; i < data.length; i++) {
                titulos.push(data[i][0]);
                valores.push(data[i][1]);
            }
            const ctx = document.getElementById('chartAcademias');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: titulos,
                    datasets: [{
                        label: 'Número de grupos por academia',
                        data: valores,
                        backgroundColor: [
                            'rgb(102, 205, 170)',
                            'rgb(143, 188, 139)',
                            'rgb(32, 178, 170)',
                            'rgb(72, 209, 204)'
                        ],
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

    function graficoInscritos() {
        $.ajax({
            'url': 'config/grafico_inscripciones.php',
            'type': 'POST'
        }).done(function(resp) {
            var titulos = [];
            var valores = [];
            var data = JSON.parse(resp);
            for (var i = 0; i < data.length; i++) {
                titulos.push(data[i][0]);
                valores.push(data[i][1]);
            }
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: titulos,
                    datasets: [{
                        label: 'Cantidad clientes',
                        data: valores,
                        backgroundColor: [
                            'rgb(147, 112, 219)',
                            'rgb(102, 205, 170)'
                        ],
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