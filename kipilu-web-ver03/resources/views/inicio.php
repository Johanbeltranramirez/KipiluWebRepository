<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Inicio</title>
    <link rel="icon" href="img/logo.ico">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--MENU-->
    <link rel="stylesheet" href="css/men_fot.css">
    <!--LLAMAR ICONOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
   <style>
        .body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .mission {
         text-align: center;
         margin-top: 600px; 
          }

        .mission h5 {
            font-family: 'Source Sans', sans-serif;
            color: #444444;
        }

        .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-left: 2cm; 
            margin-right: 2cm; 
            margin-top: 20px; 

        }

        .content-left {
            flex: 1;
            margin-bottom: 2px;
        }

        .content-right {
            flex: 1;
        }

        .content-text {
            text-align: justify; 
        }

        .content-left {
            flex: 1;
            margin-bottom: 20px; 
            margin-right: 105px; 
        }

        .content-right {
            flex: 1;
            margin-bottom: 20px; 
            margin-left: 105px; 
        }

        .red-bullet {
         color: red;
         margin-right: 5px; /
        }

        .highlight {
            background-color: #d6d6d6;
            padding: 20px;
        }

        .image-text {
            display: flex;
            align-items: center;
            margin: 20px 0;
            text-align: left;
            margin-left: 2cm; 

        }

        .overlay {
         position: relative;
         display: inline-block;
         width: 100%; 
         height: 100%; 
        }

      .overlay img {
       width: 100%;
       height: 100%;
      object-fit: cover;
      }

      .overlay .text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.7);
      color: white;
      font-size: 24px;
      padding: 300px; 
      text-align: center;
      width: 100%; 
      height: 100%; 
      }


    .overlay {
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 75%;
     z-index: -1; 
    } 
 
    .overlay img {
     width: 100%;
     height: 100%;
     object-fit: cover; 
    }
    .card {
    border: 2px solid white; 
    }



    @media screen and (max-width: 768px) {
        .content {
            flex-direction: column;
            align-items: center;
            margin-left: 10px;
            margin-right: 10px;
        }

        .content-left,
        .content-right {
            flex: none;
            width: 100%;
            margin-right: 0;
            margin-left: 0;
        }

        .overlay .text {
            font-size: 16px;
            padding: 160px;
            text-align: center;
        }
        .mission {
            margin-top: 480px; 
        }

      
    }

    @media screen and (max-width: 768px) {
        .card {
            margin: 0 auto; /* Centrar horizontalmente */
            text-align: center; /* Centrar el contenido de la carta */
            margin-right: 2cm; 

        }
    }

</style>


</head>
<body>

<!--Nav(navegacion)-->
<nav class="navbar navbar-expand-lg bg-body-tertiary" >
    <div class="container-fluid" style="background-color: #ffffff;">
        <div class="d-flex justify-content-start align-items-center" >
            <img src="img/logo.ico" alt="Logo" style="max-height: 100px; margin-right: 10px;">
            <a class="navbar-brand custom-brand" href="index.php">HOGAR DE <br> RESCATE</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Adopciones
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="Tips.php">Tips y recomendaciones</a></li>
                        <li><a class="dropdown-item" href="catalogoc.php">Catalogo de caninos</a></li>
                        <li><a class="dropdown-item" href="catalogof.php">Catalogo de felinos</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="donaciones.php">Sobre Donaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comentarios.php">Comentarios e Historias</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--Cierre Nav(navegacion)-->
<br>
<!--main(contenedor)-->
<main>

<section class="overlay">
    <img src="images/index1.jpg" class="img-fluid" alt="...">
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
          
            <div class="col-md-6">
                <img src="images/index2.jpg" class="img-thumbnail img-fluid" alt="...">
            </div>
            <div class="col-md-6">
                <p class="h5" style="font-family: 'Source Sans Pro', sans-serif; color: #444444; font-weight:600;">ACERCA DE NOSOTROS</p>
                <p style="font-family: 'Source Sans Pro', sans-serif; color: #000; text-align: justify;">
                    En nuestro hogar de rescate para perros y gatos, nos esforzamos por brindar cuidado, atención y amor a los animales que han sido abandonados, maltratados o perdidos. Nos dedicamos a proporcionar un ambiente seguro y cómodo para los animales mientras esperan ser adoptados por una familia amorosa y responsable. Contamos con un equipo de voluntarios capacitados y dedicados que trabajan incansablemente para garantizar la salud y el bienestar de los animales bajo nuestra protección. Además, ofrecemos servicios como atención veterinaria completa y programas de socialización y entrenamiento para ayudar a los animales a recuperarse y prepararse para una nueva vida. En nuestro hogar de rescate, estamos comprometidos con el objetivo de salvar la mayor cantidad posible de vidas animales y fomentar una comunidad de adopción responsable y amorosa.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="image-text">
  
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="images/imagen llilli.jpg" class="img-fluid rounded-start" alt="...">
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
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-img-container">
                    <br>
                    <img src="images/index4.jpeg" class="card-img-top img-fluid" alt="...">
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


</main>
<!--Footer(pie de pag)-->
<footer id="contacto">
    <div class="contenedor footer-content">
        <div class="contact-us">
            <h2 class="bland">Acerca de nosotros</h2><br>
            <p style="text-align: justify;">Un hogar de refugio de perros y gatos es un lugar donde se brinda cuidado, atención y amor a animales que han sido abandonados, maltratados o perdidos. Estos hogares se dedican a proporcionar un ambiente seguro y cómodo para los animales mientras esperan ser adoptados por una familia amorosa.</p>
            <p><strong>Contacto:</strong></p>
            <p>Teléfono: 3143638383</p>
            <p>Correo: hogarusmerescate@gmail.com</p>
        </div>

        <div class="social-media">
            <h2 class="bland">Redes<br>sociales</h2>

            <a href="https://www.facebook.com/profile.php?id=100084248649661&mibextid=ZbWKwL" target="_blank" class="social-media-icon">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://twitter.com//ManuelM16762431" target="_blank" class="social-media-icon">
                <i class="fab fa-x"></i>
            </a>
            <a href="https://www.instagram.com/juancm484?r=nametag" target="_blank" class="social-media-icon">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>

    <div class="line"></div>
    
</footer>
<!--Cierre Footer(pie de pag)-->

</body>
</html>
