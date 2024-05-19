<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KIPILU - CRUD ADOPTS Listado</title>
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- MENU -->
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://images.moqups.com/repo/RcVv9iMoCs1Xou20BhiDQL8vlVPeCyBp/p_fXXmkYw3IQMv2g0y2wz86dk6AAesO5NP/zWiZs3qNuM5h1edOQq3Tq2GH2Ie4Tuep.png?Expires=1695515377&Signature=kz8kPP4jU529LicPivmChlI0PYQ2vkkNHFW8HnL2L1e1OiyDGPeF5K8B-E~B9AAT83jYo8PEl1LmH3uARHxsuMfIxUWSnIJ7-K~~Soi2Wki4RXi9V7VJfoxNdg-AaQ-ArwXmCSxoVRGKCD2mv3bt68mKuLcoBZbR9cxw1IkMpcj34Mlng96K3rfnzvNo94zLkFMAMNESrOZa92zAbDfQmYrCqYfvht3ovpPxqSst67aV~q-cG3EFmsGd4T23W3YZ-S6JrJV9sK9-X2y3pyexKoS4McjHS6oZSvjVXh~e6eKzwy98wnKrfv8LpD6lypxaUAIdtYZf1Rp6OF7Xj7wlQA__&Key-Pair-Id=K1TPUF1X6HKIYU');
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        form {
            text-align: center;
            margin: 20px auto;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 8px 16px;
            background-image: linear-gradient(to bottom, #c8e3fd, #94ebe3, #3fcdcd, #6aaef3);
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #fff;
            border-radius: 5px;

        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-image: linear-gradient(to bottom, #c8e3fd, #94ebe3, #3fcdcd, #6aaef3);
            color: #000000;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Estilos para los mensajes de éxito y error */
        .mensaje-exito {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin: 10px auto;
            width: 80%;
            text-align: center;
        }

        .mensaje-error {
            background-color: #dc3545;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin: 10px auto;
            width: 80%;
            text-align: center;
        }
    </style>
</head>

<body>
    <!--Nav(navegacion)-->
 <nav class="navbar navbar-expand-lg bg-body-tertiary" >
    <div class="container-fluid" style="background-color:  #ffff;">
      <div class="d-flex justify-content-start align-items-center" style="background-color:  #ffff;">
        <img src="logo.ico" alt="Logo" style="max-height: 100px; margin-right: 10px;">
        <a class="navbar-brand custom-brand" href="index.php">HOGAR DE <br> RESCATE</a>

      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../inicio.php">CRUD Administrador</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="../CRUD_Adop/Adoptantes.php" role="button">
              CRUD Adoptante
            </a>
          </li>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              CRUD animales
            </a>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../CRUD_ANIMAL/crear_animal.php">Crear animales</a></li>
              <li><a class="dropdown-item" href="../CRUD_ANIMAL/leer_animal.php">Ver animales</a></li>
              <li><a class="dropdown-item" href="../CRUD_ANIMAL/eliminar_animal.php">Eliminar animales</a></li>
            </ul>
          </li>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            CRUD Adoptantes
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../CRUD_Adop/Adoptantes.php">Ver Adoptantes</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="../CRUD_FORMULARIO/CRUD_Formulario.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              CRUD Formulario
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../CRUD_COMENTARIO/CRUD_Comentarios.php" role="button">
              CRUD Comentarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index2.php">Volver al inicio</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</section>
<br>

    <h2>Buscar Adoptante:</h2>
    <form method="GET" action="">
        <input type="text" name="busqueda" placeholder="ID Adoptante">
        <input type="submit" value="Buscar">
    </form>
    <br>

    <?php
    $db_host = "localhost";
    $db_nombre = "kipilu";
    $db_usuario = "root";
    $db_contra = "";

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtener todos los administradores
    $consulta_todos = "SELECT ID_Adoptante, P_Nombre, S_Nombre, P_Apellido, S_Apellido, Correo, Direccion, Telefono  FROM adoptantes";
    $resultados_todos = mysqli_query($conexion, $consulta_todos);

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID_Adoptante</th>";
    echo "<th>P_Nombre</th>";
    echo "<th>S_Nombre</th>";
    echo "<th>P_Apellido</th>";
    echo "<th>S_Apellido</th>";
    echo "<th>Correo</th>";
    echo "<th>Direccion</th>";
    echo "<th>Telefono</th>";
    echo "</tr>";

    while ($fila = mysqli_fetch_assoc($resultados_todos)) {
        echo "<tr>";
        echo "<td>" . $fila['ID_Adoptante'] . "</td>";
        echo "<td>" . $fila['P_Nombre'] . "</td>";
        echo "<td>" . $fila['S_Nombre'] . "</td>";
        echo "<td>" . $fila['P_Apellido'] . "</td>";
        echo "<td>" . $fila['S_Apellido'] . "</td>";
        echo "<td>" . $fila['Correo'] . "</td>";
        echo "<td>" . $fila['Direccion'] . "</td>";
        echo "<td>" . $fila['Telefono'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    if (isset($_GET['busqueda']) && !empty($_GET['busqueda'])) {
        $busqueda = mysqli_real_escape_string($conexion, $_GET['busqueda']);
        $consulta = "SELECT ID_Adoptante, P_Nombre, S_Nombre, P_Apellido, S_Apellido, Correo, Direccion, Telefono FROM adoptantes WHERE ID_Adoptante LIKE '%$busqueda%'";
        $resultados = mysqli_query($conexion, $consulta);

        if (mysqli_num_rows($resultados) > 0) {
            echo "<div class='mensaje-exito'>Se encontraron resultados.</div>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>ID_Adoptantes</th>";
            echo "<th>P_Nombre</th>";
            echo "<th>S_Nombre</th>";
            echo "<th>P_Apellido</th>";
            echo "<th>S_Apellido</th>"; 
            echo "<th>Correo</th>";
            echo "<th>Direccion</th>";
            echo "<th>Telefono</th>";
            echo "</tr>";

            while ($fila = mysqli_fetch_assoc($resultados)) {
                echo "<tr>";
                echo "<td>" . $fila['ID_Adoptante'] . "</td>";
                echo "<td>" . $fila['P_Nombre'] . "</td>";
                echo "<td>" . $fila['S_Nombre'] . "</td>";
                echo "<td>" . $fila['P_Apellido'] . "</td>";
                echo "<td>" . $fila['S_Apellido'] . "</td>";
                echo "<td>" . $fila['Correo'] . "</td>";
                echo "<td>" . $fila['Direccion'] . "</td>";
                echo "<td>" . $fila['Telefono'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "<a class='btn btn-primary' href='leer_datos.php'>Volver a Inicio</a>";
        } else {
            echo "<div class='mensaje-error'>No se encontraron resultados o el ID no existe.</div>";
        }
    }

    mysqli_close($conexion);
    ?>

</body>
</html>
