<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD ANIMALES Crear Animales</title>
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/controllers_styles/formulario_crear.css">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container mt-5">
        <h1 class="text-center">Agregar nuevo Animal</h1>
         <form action="logic/animales-controller/viewModel_crear.php" method="POST" class="custom-form">
            <div class="form-group">
                <label for="Nombre_Animal">Nombre del Animal:</label>
                <input type="text" name="Nombre_Animal" class="form-control" required maxlength="25">
            </div>

            <div class="form-group">
                <label for="Raza">Raza:</label>
                <select name="Razas" class="form-control" required>
                    <option></option>
                    <option value="1">Siames</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Sexo">Sexo:</label>
                <select name="Sexo" class="form-control" required>
                    <option></option>
                    <option value="1">Hembra</option>
                    <option value="2">Macho</option>
                </select>
            </div>

            <div class="form-group">
              <label for="Foto">Foto del Animal (URL de firebase):</label>
              <input type="text" name="Foto" class="form-control" required>
           </div>

           <div class="form-group">
                <label for="Descripcion">Descripción:</label>
                <textarea name="Descripcion" class="form-control" rows="3" maxlength="300" required></textarea>
            </div>

            <div class="form-group">
                <label for="Especie_Animal">Especie del Animal:</label>
                <select name="Especie_Animal" class="form-control" required>
                    <option></option>
                    <option value="1">Canino</option>
                    <option value="2">Felino</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Estado_Animal">Estado del Animal:</label>
                <select name="Estado_Animal" class="form-control" required>
                    <option></option>
                    <option value="1">Adoptado</option>
                    <option value="2">No adoptado</option>
                    <option value="3">En proceso</option>
                </select>
            </div><br>
            <div class="mb-4">
                <button type="submit" class="btn btn-success mb-2 w-20">Crear</button>
                <a href="animales_controller.php" class="btn btn-primary  mb-2 w-20">Volver al inicio</a>
            </div>
        </form>
</div>

</body>
</html>