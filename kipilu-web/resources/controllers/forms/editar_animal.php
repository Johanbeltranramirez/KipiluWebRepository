<?php
require_once '../logic/animales-controller/viewModel_editar.php';

$viewModel = new AnimalUpdateViewModel();
$animal = null; // Inicializamos la variable $animal

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animalId = $_POST['ID_Animal'];
    $animalData = [
        'Nombre_Animal' => $_POST['Nombre_Animal'],
        'Razas' => $_POST['Razas'],
        'Sexo' => $_POST['Sexo'],
        'Foto' => $_POST['Foto'],
        'Descripcion' => $_POST['Descripcion'],
        'Especie_Animal' => $_POST['Especie_Animal'],
        'Estado_Animal' => $_POST['Estado_Animal']
    ];

    $success = $viewModel->updateAnimal($animalId, $animalData);
    if ($success) {
        $message = ['type' => 'success', 'text' => 'El animal se actualizó correctamente.'];
        $animal = $viewModel->getAnimalById($animalId); // Volver a obtener los datos del animal actualizado
    } else {
        $message = ['type' => 'danger', 'text' => 'Error al actualizar el animal.'];
    }
} elseif (isset($_GET['id'])) {
    $animalId = $_GET['id'];
    $animal = $viewModel->getAnimalById($animalId);
    $razas = $viewModel->fetchRazas()['data'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/icon/admin_icon.png">
    <title>KIPILU - CRUD ANIMALES Editar Animal</title>
    <link rel="stylesheet" href="../../css/controllers_styles/formulario_crear.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<script>
function validateText(input) {
    // Elimina cualquier carácter que no sea letra o letra con tilde
    input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ.]/g, '');
}

function validateTextDes(input) {
    // Elimina cualquier carácter que no sea letra, letra con tilde, espacio, punto o coma
    input.value = input.value.replace(/[0-9]/g, '');
}
</script>

<div class="container mt-5">
    <h1 class="text-center">Editar Animal</h1>
    <div id="notification" class="notification"></div>
    <?php if ($animal): ?>
        <form id="animalForm" method="POST" class="custom-form">
            <input type="hidden" name="ID_Animal" value="<?php echo $animal['data']['ID_Animal']; ?>">
            <div class="form-group">
                <label for="Nombre_Animal">Nombre del Animal:</label>
                <input type="text" name="Nombre_Animal" class="form-control" value="<?php echo $animal['data']['Nombre_Animal']; ?>" required maxlength="20" oninput="validateText(this)">
            </div>
            <div class="form-group">
                <label for="Razas">Raza:</label>
                <select name="Razas" class="form-control" required>
                    <option>Selecciona una raza</option>
                    <?php foreach ($razas as $raza): ?>
                        <option value="<?php echo $raza['ID_Raza']; ?>" <?php echo ($raza['ID_Raza'] == $animal['data']['Razas']) ? 'selected' : ''; ?>>
                            <?php echo $raza['Nombre_Raza']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Sexo">Sexo:</label>
                <select name="Sexo" class="form-control" required>
                    <option>Selecciona un sexo</option>
                    <option value="1" <?php echo ($animal['data']['Sexo'] == 1) ? 'selected' : ''; ?>>Hembra</option>
                    <option value="2" <?php echo ($animal['data']['Sexo'] == 2) ? 'selected' : ''; ?>>Macho</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Foto">Foto del Animal (URL de firebase):</label>
                <input type="text" name="Foto" class="form-control" value="<?php echo $animal['data']['Foto']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Descripcion">Descripción:</label>
                <textarea name="Descripcion" class="form-control" rows="3" maxlength="300" required><?php echo $animal['data']['Descripcion']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="Especie_Animal">Especie del Animal:</label>
                <select name="Especie_Animal" class="form-control" required>
                    <option>Selecciona una especie</option>
                    <option value="1" <?php echo ($animal['data']['Especie_Animal'] == 1) ? 'selected' : ''; ?>>Canino</option>
                    <option value="2" <?php echo ($animal['data']['Especie_Animal'] == 2) ? 'selected' : ''; ?>>Felino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Estado_Animal">Estado del Animal:</label>
                <select name="Estado_Animal" class="form-control" required>
                    <option>Selecciona un estado</option>
                    <option value="1" <?php echo ($animal['data']['Estado_Animal'] == 1) ? 'selected' : ''; ?>>Adoptado</option>
                    <option value="2" <?php echo ($animal['data']['Estado_Animal'] == 2) ? 'selected' : ''; ?>>No adoptado</option>
                    <option value="3" <?php echo ($animal['data']['Estado_Animal'] == 3) ? 'selected' : ''; ?>>En proceso</option>
                </select>
            </div>
            <br>
            <div class="mb-4">
                <button type="submit" class="btn btn-success mb-2 w-20">Actualizar</button>
                <a href="../animales_controller.php" class="btn btn btn-secondary mb-2 w-20">Volver</a>
            </div>

            <?php if (isset($message)): ?>
    <div class="alert alert-<?php echo $message['type']; ?> mt-3" role="alert">
        <?php echo $message['text']; ?>
        <script>
            setTimeout(() => {
                document.querySelector('.alert').remove();
            }, 3000);
        </script>
    </div>
<?php endif; ?>


    </form>
            <?php else: ?>
                <div class="alert alert-danger mt-3" role="alert">
                  No se encontró el animal con el ID proporcionado.
                </div>
              <?php endif; ?>
</div>

</body>
</html>

