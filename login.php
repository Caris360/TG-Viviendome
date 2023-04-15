<html>

<head>
	<link rel="icon" href="images/Logo.PNG" />
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="css/Loginstyle.css">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<title>Inicio Sesión</title>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-15">
					<div class="wrap d-md-flex" style="border-radius: 20px; background-color: white;">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last" style="border-radius: 20px;">

						</div>
						<div class="login-wrap p-4 p-lg-5" style="border-radius: 20px;">
							<div class="d-flex">
								<div class="w-100 text-center">
									<h3 class="mb-4" style="font-family: Poppins-Bold; font-size: 30px;"><strong><IMG class="text-center" style="margin-bottom: 5%;" SRC="images/Logo.PNG">Iniciar Sesión</strong></h3>
								</div>
							</div>
							<form action="config/login_config.php" method="POST" class="signin-form">
								<div class="form-group mb-3">
									<label class="label" for="name">Usuario</label>
									<input style="font-family: Poppins-Medium;" type="text" id="user" name="user" class="form-control" placeholder="Ingrese su usuario" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Contraseña</label>
									<input style="font-family: Poppins-Medium;" type="password" id="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
								</div>
								<br><br>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary submit px-3">Ingresar</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>