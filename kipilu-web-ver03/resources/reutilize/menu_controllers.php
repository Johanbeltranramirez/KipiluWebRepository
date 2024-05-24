<!-- menu_controllers.php -->
<link rel="stylesheet" href="../css/men_fot.css">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid" style="background-color:  #ffff;">
        <div class="d-flex justify-content-start align-items-center" style="background-color:  #ffff;">
            <img src="../../assets/icon/logo.ico" alt="Logo" style="max-height: 100px; margin-right: 10px;">
            <a class="navbar-brand custom-brand" href="index.php">HOGAR DE <br> RESCATE</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="administradores_controller.php">Gestionar Administradores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="animales_controller.php" role="button">Gestionar  Animales</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="adoptantes_controller.php" role="button">Gestionar Adoptantes</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="formularios_controller.php" role="button">Gestionar Formularios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comentarios_controller.php" role="button">Gestionar Comentarios</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../controllers/logic/login/cerrar_sesion.php">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
    </div>
</nav>
