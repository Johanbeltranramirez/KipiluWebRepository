<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILÚ - CRUD Formulario</title>
    <!--Eliminar-->
    <script defer src=".../js/Confirmar_Eliminar.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <!--BOOSTRAP-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
     rel="stylesheet" 
     integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
     crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
     integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
     crossorigin="anonymous">
    </script>
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/controllers_styles/formulario_controller.css">
    
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

  <div class="container2">
    <br>
    <br>
    <h1 class="text-center"  style="font-size:35px;">Leer Formularios</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="search-form">
    <input type="text" name="ID_Buscar" class="form-control search-input" style="width: 220px" placeholder="Buscar por ID_Formulario">
    <button type="submit" class="btn btn-light gradient-btn search-button" style="background-image: linear-gradient(to right, #e6f1f1, #95f195b6); color: black; font-weight: bold;">Buscar</button>
</form>

<!--MOSTRAR EL FORMULARIO ENCONTRADO-->
    <div class="mensaje" style="margin-left: 200px;">
    <?php echo $mensaje; ?>
    </div>
    <?php if ($formularioEncontrado) : ?>
        <table class="table">
            <thead>
                <tr>
                <th>ID_Formulario</th>
                <th>Adoptante</th>
                <th>Animal</th>
                <th>Validación Donativo</th>
                <th>Estado de Solicitud</th>
                <th>Administrador</th>
                <!--<th>Acciones</th>-->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $formularioEncontrado['ID_Formulario']; ?></td>
                    <td><?php echo $formularioEncontrado['Adoptante']; ?></td>
                    <td><?php echo $formularioEncontrado['Animal']; ?></td>
                    <td><?php echo $formularioEncontrado['Validacion_donativo']; ?></td>
                    <td><?php echo $formularioEncontrado['Estado_solicitud']; ?></td>
                    <td><?php echo $formularioEncontrado['Administrador']; ?></td>
                   <!-- <td>
                    <a href='Actualizar_Formulario.php?ID_Formulario=" . $fila['ID_Formulario'] . "'><button class='boton-estilizado'>Actualizar</button></a>
                    <a href='Eliminar_Formulario.php?ID_Formulario=" . $fila['ID_Formulario'] . "' onclick='return confirmar()'><span><button class='boton-estilizado'>Eliminar</button></span></a>
                   </td>-->
                </tr>
            </tbody>
        </table>
        <a href="../controllers/formularios_controller.php" class="btn btn-light gradient-btn" style="margin-left: 855px; margin-top:1px; background-image: linear-gradient(to right, #e6f1f1, #95f195b6); color: black; font-weight: bold;">Cerrar</a>
        <?php endif; ?>
        <!--FIN MUESTRA LA TABLA ENCONTRADA-->

    <h2 style="margin-left: 200px; font-size: 25px">Lista de Formularios</h2>
     <br>

    <table class="table">
        <thead>
        <tr>
                <th>ID_Formulario</th>
                <th>Adoptante</th>
                <th>Animal</th>
                <th>Validación Donativo</th>
                <th>Estado de Solicitud</th>
                <th>Administrador</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado_todos && $resultado_todos->num_rows > 0) {
              while ($fila = $resultado_todos->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $fila['ID_Formulario'] . "</td>";
                  echo "<td>" . $fila['Adoptante'] . "</td>";
                  echo "<td>" . $fila['Animal'] . "</td>";
                  echo "<td>" . $fila['Validacion_donativo'] . "</td>";
                  echo "<td>" . $fila['Estado_solicitud'] . "</td>";
                  echo "<td>" . $fila['Administrador'] . "</td>";
                  echo "<td>
                  <a href='../controllers/formularios-controller/Actualizar_Formulario.php?ID_Formulario=" . $fila['ID_Formulario'] . "'><button class='boton-estilizado'>Actualizar</button></a>
                  <a href='../controllers/formularios-controller/Eliminar_Formulario.php?ID_Formulario=" . $fila['ID_Formulario'] . "' onclick='return confirmar()'><span><button class='boton-estilizado'>Eliminar</button></span></a>
                  </td>";
                  echo "</tr>";
              }
          }
          
            else 
            {
                echo "<tr><td colspan='8'>No se encontraron formularios.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


</body>
</html>