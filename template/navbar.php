<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="inicio.php" class="navbar-brand">
            <img src="images/Logo.PNG" height="28" alt="Viviendome">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
            <div class="navbar-nav">
                <div class="nav-item dropdown">
                    <a style="color: #000;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Clientes</a>
                    <div class="dropdown-menu">
                        <a href="/registro_clientes.php" class="dropdown-item">Registrar</a>
                        <a href="/listar_clientes.php" class="dropdown-item">Listar</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a style="color: #000;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Academias</a>
                    <div class="dropdown-menu">
                        <a href="/gestion_academias.php" class="dropdown-item">Gestión</a>
                        <a href="/gestion_grupos.php" class="dropdown-item">Grupos</a>
                        <a href="/gestion_clases.php" class="dropdown-item">Clases</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a style="color: #000;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Talleres</a>
                    <div class="dropdown-menu">
                        <a href="/registro_talleres.php" class="dropdown-item">Registrar</a>
                        <a href="/listar_talleres.php" class="dropdown-item">Listar</a>
                    </div>
                </div>
                <a style="color: #000;" href="/gestion_inscripciones.php" class="nav-item nav-link">Inscripciones</a>
                <div class="nav-item dropdown">
                    <a style="color: #000;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Repisa</a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Productos</a>
                        <a href="#" class="dropdown-item">Listado</a>
                        <a href="#" class="dropdown-item">Venta</a>
                    </div>
                </div>
                <a style="color: #000;" href="#" class="nav-item nav-link">Pagos</a>
                <a style="color: #000;" href="#" class="nav-item nav-link">Reportes</a>
                <a style="color: #000;" href="#" class="nav-item nav-link">Indicadores</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="config/exit.php" class="btn btn-secondary">Cerrar Sesión</a>
            </div>
        </div>
    </div>
</nav>