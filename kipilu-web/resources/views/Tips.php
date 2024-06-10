<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Tips y Recomendaciones</title>
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--MENU-->
    <link rel="stylesheet" href="css/men_fot.css">
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/Tips.css">
    <link rel="icon" href="../../assets/icon/logo.png">
    <!--LLAMAR ICONOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu.php'; ?>
<!--Cierre Nav(navegacion)-->
      

<main>
  <section class="contenedor-externo">
            <div class="contenedor2">
                <section class="titulo">
                    <h1 class="titulo-letra">Adopción segura</h1>
                    <hr class="linea">
                </section>

                <!-- Primer artículo -->
                <article class="contenido1">
                    <!-- Texto -->
                    <div class="texto">
                        <p>El acto de adoptar es una gran compromiso y responsabilidad que puede oscilar entre los 15 y 20 años, este es el promedio de vida de un gato y perro. Por eso es importante que estés listo y capacitado para hacerte responsable de una nueva vida que dependerá de ti.
                        <a href="https://www.mediafire.com/file/gm9ajd025dsltlm/application-a46d3907-0a5b-4a8a-bdd7-7474518c0541_%25281%2529_%25281%2529.apk/file" class="button">Descarga nuestra app aquí</a>, para optimizar tus adopciones ;D</p>
                        <?php
// Archivo a descargar
$file ='https://www.mediafire.com/file/gm9ajd025dsltlm/application-a46d3907-0a5b-4a8a-bdd7-7474518c0541_%25281%2529_%25281%2529.apk/file';

// Verifica si el archivo existe
if (file_exists($file)) {
    // Define los encabezados
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    
    // Limpia el buffer de salida
    ob_clean();
    flush();
    
    // Lee el archivo y lo envía al output buffer
    readfile($file);
    exit;
} else {
    // Muestra un mensaje de error si el archivo no existe
    echo "El archivo no existe.";
}
?>

                        <p>Antes de hacer esto, un hecho que debes analizar es el espacio que dispones en tu casa, el tiempo que puedes dedicarle para educarlo, acompañarlo, darle la actividad física y cuidados que necesite.</p>
                        <p>Comienza por revisar los costos de alimentación, atención veterinaria, elementos para su adaptación en casa y precios de estadía cuando estés fuera de casa.</p>
                    </div>

                    <!-- Imagen -->
                    <div class="imagen" style="max-width: 300px;">
                        <img src="https://www.adoptanocompres.org/wp-content/uploads/2022/04/10.-Adopta-Requisitos-600x599.png" alt="imagen1" style="width: 100%;">
                    </div>
                </article>

                <!-- Segundo artículo -->
                <article class="contenido1">
                   <!-- Imagen -->
                   <div class="imagen" style="max-width: 300px; margin-left: 20px;">
                        <img src="https://www.adoptanocompres.org/wp-content/uploads/2022/04/11.-Adopta-Requisitos.png" alt="imagen2" style="width: 100%;">
                    </div>
                    <!-- Texto -->
                    <div class="texto" style="margin-left: 20px;">
                        <p>También debes analizar las edades y tipos de comportamiento de los animales, no es lo mismo un cachorro a un adulto mayor.</p>
                        <p>Los cachorros son muy lindos y tiernos, pero requieren de mucho tiempo y cuidado. Ellos deben alimentarse entre 3 y 4 veces al día, suelen llorar al quedarse solos, muerden muchos objetos porque al igual que un bebé humano les molesta las encías y buscan cosas que les ayuden a aliviar estas molestias. Hacen pipí y defecan en cualquier parte. El tamaño final no se puede garantizar hasta que completen el año de edad. Serán fuente de amor y mucha actividad física en la familia.</p>
                        <p>Un perro adulto o adulto mayor ya está esterilizado, se puede sacar a la calle, tiene un tamaño definido, se habitúa más fácil a la familia, son muy agradecidos y cariñosos con los miembros de ella. Aceptan su espacio en la manada, y no requieren tanto trabajo pues suelen ser muy calmados. Cuando ya son adultos mayores puede que no duren mucho tiempo pero hay ser consientes que ellos merecen un hogar y son la mejor compañía.</p>
                    </div>

            
                </article>

                <!-- Tercer artículo -->
                <article class="contenido1">
                    <!-- Texto -->
                    <div class="texto">
                        <p><b>Si tu decisión es sí y te sientes listo para recibir un nuevo integrante en la familia, estos son los pasos a seguir:</b></p>
                        <p>🐾Debes llenar el formulario de adopción en su totalidad, este formulario se encuentra en la parte del catálogo, cuando le das "click" en el botón "Iniciar adopción" que está en cada información del animal.</p>
                        <p>🐾Si tu formulario es aprobado te contactaremos por medio de correo para programar una entrevista virtual de adopción, en donde tendremos una charla de tenencia responsable y esperamos conocerte más a fondo; al igual que ver el espacio donde viviría el animal.</p>
                        <p>🐾Los adoptantes deben asumir los gastos básicos como los son: esterilización, vacunas y desparasitación.</p>
                    </div>

                    <!-- Imagen -->
                    <div class="imagen" style="max-width: 300px;">
                        <img src="https://www.adoptanocompres.org/wp-content/uploads/2022/04/12.-Adopta-requisitos-600x599.png" alt="imagen3" style="width: 100%;">
                    </div>
                </article>
            </div>
        </section>

    </main>
<br>




<!--Footer(pie de pag)-->
<?php include '../reutilize/footer.php'; ?>
<!--FIN DE Footer(pie de pag)-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--Fin Footer(pie de pag)-->
</body>
</html>

