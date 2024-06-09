<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Inicio</title>
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--MENU-->
    <link rel="stylesheet" href="css/men_fot.css">
    <!--LLAMAR ICONOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../../assets/icon/logo.png">
   <!-- Enlazar el archivo CSS externo -->
   <link rel="stylesheet" href="../css/inicio.css">
   


</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu.php'; ?>
<!--Cierre Nav(navegacion)-->
<br>
<!--main(contenedor)-->
<main>

<section class="overlay">
    <div class="text">
        <p>La adopción de un perro o un gato no sólo puede transformar tu propia vida, sino también la de aquellos que te rodean. Adoptar es una forma maravillosa de dar una segunda oportunidad a un animal sin hogar y a su vez, mejorar su propia calidad de vida.</p>
    </div>
</section>

<section class="mission" style="margin-bottom: 40px;">
    <h1><span class="red-bullet">&bull;&bull;&bull;</span> Nuestra Misión <span class="red-bullet">&bull;&bull;&bull;</span></h1>
    <p>Trabajando para el bien de los animalitos.</p>
</section>

<section class="content">
    <div class="content-left">
        <h4>LO QUE HACEMOS</h4>
        <div class="content-text">
            <p>En la fundación, los animales que llegan reciben una atención veterinaria completa y detallada que incluye desde la esterilización, vacunación, desparasitación, identificación mediante microchip y cualquier otro tratamiento que necesiten para asegurar su bienestar. Este proceso de cuidado se lleva a cabo hasta que se les pueda encontrar un hogar amoroso y responsable que los cuide de por vida. De esta manera, se garantiza que los animales puedan recuperarse de cualquier enfermedad o lesión y que estén en las mejores condiciones para iniciar una nueva vida en un hogar permanente.</p>
        </div>
    </div>
    <div class="content-right">
        <h4>LO QUE QUEREMOS</h4>
        <div class="content-text">
            <p>Proporcionar un ambiente seguro, limpio y cómodo para los animales que se encuentran allí. También es importante contar con personal capacitado y dedicado que proporcione atención médica y cariño a los animales, así como programas de socialización y entrenamiento para prepararlos para su adopción. La sostenibilidad financiera del refugio también es esencial para asegurar que pueda continuar brindando atención y cuidado a los animales necesitados. En general, el objetivo es proporcionar a los animales una segunda oportunidad de vida y promover la adopción responsable y consciente de mascotas.</p>
        </div>
    </div>
</section>

<section class="highlight">
    <div class="container">
        <div class="row align-items-center">
          
            <div class="col-md-5">
                <img src="../../assets/img/inicio/index2.jpg" class="img-thumbnail img-fluid" alt="...">
            </div>
            <div class="col-md-6">
                <p class="h5">ACERCA DE NOSOTROS</p>
                <p style="font-family: 'Source Sans Pro', sans-serif; color: #000; text-align: justify;">
                    En nuestro hogar de rescate para perros y gatos, nos esforzamos por brindar cuidado, atención y amor a los animales que han sido abandonados, maltratados o perdidos. Nos dedicamos a proporcionar un ambiente seguro y cómodo para los animales mientras esperan ser adoptados por una familia amorosa y responsable. Contamos con un equipo de voluntarios capacitados y dedicados que trabajan incansablemente para garantizar la salud y el bienestar de los animales bajo nuestra protección. Además, ofrecemos servicios como atención veterinaria completa y programas de socialización y entrenamiento para ayudar a los animales a recuperarse y prepararse para una nueva vida. En nuestro hogar de rescate, estamos comprometidos con el objetivo de salvar la mayor cantidad posible de vidas animales y fomentar una comunidad de adopción responsable y amorosa.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="image-text">
  
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../../assets/img/inicio/imagen llilli.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">Fecha  •  03/04/2023</small></p>
                    <h5 class="card-title">ADOPCION RESPONSABLE</h5>
                    <p class="card-text">Ofrecemos información y recursos para ayudar a las personas a tomar una decisión informada y comprometida al adoptar un perro o un gato.</p>
                </div>
            </div>
        </div>
    </div>
</section>
</section>

<section class="image-text">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-img-container">
                    <img src="../../assets/img/inicio/index4.jpeg" class="card-img-top img-fluid" alt="...">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text"><small class="text-muted">Fecha • 03/04/2023</small></p>
                    <h5 class="card-title">CUIDADOS DE LOS ANIMALITOS</h5>
                    <p class="card-text">Programas de socialización y entrenamiento para ayudar a nuestros animales a desarrollar habilidades sociales y comportamientos positivos, lo que los prepara para ser adoptados en hogares amorosos y responsables.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
        // Verificar si la página se cargó nuevamente después de cerrar sesión
        if (window.history && window.history.pushState) {
            // Cambiar la URL en el historial del navegador
            window.history.pushState(null, null, window.location.href);
            window.onpopstate = function () {
                // Regresar a la página actual si el usuario intenta retroceder
                window.history.pushState(null, null, window.location.href);
            };
        }
        </script>


</main>

<!--Footer(pie de pag)-->
<?php include '../reutilize/footer.php'; ?>
<!--FIN DE Footer(pie de pag)-->

</body>
</html>
