<!DOCTYPE html>
<?php
// Verificar si se recibió un ID de animal y un tipo de catálogo
if (isset($_GET['animal_id']) && isset($_GET['catalogo'])) {
    // Obtener el ID del animal y el tipo de catálogo
    $animal_id = $_GET['animal_id'];
    $catalogo = $_GET['catalogo'];
} else {
    // Si no se recibieron los parámetros esperados, redirigir a una página de error o manejar el error de otra manera
    header("Location: error.php");
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILÚ - Formulario Adopción</title>
    <link rel="icon" href="../img/logo.ico">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
            crossorigin="anonymous">
    </script>
    <!--MENU-->
    <link rel="stylesheet" href="css/men_fot.css">
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/form_adopcion.css">
    <!--LLAMAR ICONOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google ReCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container">
            <h2 class="bienvenido">Bienvenid@</h2>
            <p>En este formulario podrá ingresar sus datos para validar su petición para adopción del animal seleccionado...</p>
            <form action="confirmacion.php" method="POST">

                <input type="hidden" name="animal_id" value="<?php echo $animal_id; ?>">
                <input type="hidden" name="catalogo" value="<?php echo $catalogo; ?>">

                <label for="P_Nombre">Primer Nombre *</label>
                <input type="text" id="P_Nombre" name="P_Nombre" placeholder="Digite su primer nombre" required maxlength="20">

                <label for="S_Nombre">Segundo Nombre</label>
                <input type="text" id="S_Nombre" name="S_Nombre" placeholder="Digite en caso de tener más nombres" maxlength="20">

                <label for="P_Apellido">Primer Apellido *</label>
                <input type="text" id="P_Apellido" name="P_Apellido" placeholder="Digite su primer apellido" required maxlength="20">

                <label for="S_Apellido">Segundo Apellido</label>
                <input type="text" id="S_Apellido" name="S_Apellido" placeholder="Digite su segundo apellido (opcional)" maxlength="20">

                <label for="ID_Adoptante">Número de Identificación (Cédula de Ciudadanía o extranjera) *</label>
                <input type="text" id="ID_Adoptante" name="ID_Adoptante" placeholder="Digite el número de su documento de identidad" required maxlength="10">

                <label for="Correo">Correo electrónico personal o de contacto *</label>
                <input type="email" id="Correo" name="Correo" placeholder="Digite su correo electrónico para tener contacto con usted" required maxlength="40">

                <label for="Direccion">Dirección de residencia actual *</label>
                <input type="text" id="Direccion" name="Direccion" placeholder="Digite la dirección exacta de su vivienda actual" required maxlength="40">

                <label for="Telefono">Número telefónico móvil o fijo (Para contacto) *</label>
                <input type="text" id="Telefono" name="Telefono" placeholder="Ingrese el número de telefono donde podamos contactarle" required maxlength="20">

                <div class="g-recaptcha" data-sitekey="6LfRwaspAAAAAAD_Xm2bIqfEdzWMRw2FCFbcMf_h"></div>

                    <br></br>
                <button type="submit">Enviar</button>
            </form>
            <a href="../Tips.php" class="btn">Volver al inicio</a>

        </div>

<script defer src=".../js/Validar_Form.js"></script>

</body>
</html>