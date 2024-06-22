<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Sobre Donaciones</title>
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--MENU-->
    <link rel="stylesheet" href="css/men_fot.css">
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/donaciones.css">
    <link rel="icon" href="../../assets/icon/logo.png">
    <!--LLAMAR ICONOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu.php'; ?>
<!--Cierre Nav(navegacion)-->
<main>


<div class="caja">
        <!-- Rectángulo rojo con punta de triángulo hacia la derecha -->
        <div class="rectangulo">
            ¿Qué tipo de donaciones recibimos?
        </div>

        <!-- Contenido izquierdo con margen superior -->
        <div class="contenido-container">
            <!-- Texto izquierdo -->
            <div class="texto-izquierdo">
                <p>
                    En nuestro hogar de rescate para perros y gatos, nos esforzamos por hacer que sea lo más fácil posible para las personas que desean hacer una donación. Entendemos que hay muchas maneras diferentes de hacer una contribución, ya sea en forma de alimentos de marcas como Filpo o Monello, o en efectivo a través de aplicaciones de transferencia como Nequi o Daviplata. Queremos asegurarnos de que la donación sea lo más sencilla y cómoda posible para quien desee contribuir, y estamos agradecidos por cualquier ayuda que podamos recibir para continuar nuestro trabajo en el rescate y cuidado de nuestros animales.
                </p>
                <br>
                <p>
                    En caso de que vayas a adoptar, ten en cuenta que si decides donar alimentos, debes enviarlos por medio de Picap a la dirección Calle 89C sur #7-14 Este. Si prefieres hacer una donación monetaria, la cantidad sugerida es de $100.000, pero puedes donar cualquier cantidad a partir de $10.000 en adelante. ¡Tu apoyo es invaluable para nuestra causa!
                </p>
                 <br>
                <p>
                    SI tu decisión es donar, ya sea en alimentos o dinero, es lo que realmente importa y es invaluable para nuestra causa. Si decides donar alimentos, envíalos por medio de Picap a la dirección Calle 89C sur #7-14 Este. Si prefieres hacer una donación monetaria, puedes aportar cualquier cantidad a partir de $10.000 en adelante. ¡Gracias por tu apoyo!
                </p>
                
            </div>
            <!-- Imagen derecha con sombreado -->
            <img class="imagen-derecha" src="../../assets/img/donativos/donaciones1.jpg" alt="Imagen de donaciones">
        </div>

        <!-- Botones -->
        <div class="btn-group">
            <button type="button" class="btn btn-outline-secondary">FILPO</button>
            <button type="button" class="btn btn-outline-secondary">MONELLO</button>
            <button type="button" class="btn btn-outline-secondary">NEQUI</button>
            <button type="button" class="btn btn-outline-secondary">DAVIPLATA</button>
        </div>
    </div>

      <!-- Sección de donaciones de comida -->
      <section class="donaciones">
        <!-- Texto "DONACIÓN DE COMIDA" con línea continua -->
        <h2 class="donacion-titulo">DONACIÓN  COMIDA</h2>
        
        <!-- Rectángulo rojo con borde y fondo blanco -->
        <div class="rectangulo-rojo">
            <!-- Contenedor de imágenes -->
            <div class="imagenes-container">
                <!-- Imagen 1 -->
                <div class="imagen">
                    <img src="../../assets/img/donativos/monello.jpg"  alt="Imagen 1">
                </div>
                
                <!-- Imagen 2 -->
                <div class="imagen">
                    <img src="../../assets/img/donativos/filpo.webp" alt="Imagen 2">
                </div>
            </div>
        </div>
    </section>


     <!-- Sección de donaciones de comida -->
     <section class="donaciones">
        <!-- Texto "DONACIÓN DE COMIDA" con línea continua -->
        <h2 class="donacion-titulo">DONACIÓN MONETARIA</h2>
        
        <!-- Rectángulo rojo con borde y fondo blanco -->
        <div class="rectangulo-rojo">
            <!-- Contenedor de imágenes -->
            <div class="imagenes-container">
                <!-- Imagen 1 -->
                <div class="imagen">
                    <img src="../../assets/img/donativos/QR_DAVIPLATA.PNG" alt="Imagen 1">
                    <br>
                    <br>
                    <div class="numero-contacto">Daviplata:3153683603</div>
                  </div>
                
                <!-- Imagen 2 -->
                <div class="imagen">
                    <img src="../../assets/img/donativos/QR_NEQUI.jpg"  alt="Imagen 2" >
                    <br>
                    <br>
                    <div class="numero-contacto">Nequi:3143683603</div>
                  </div>
            </div>
        </div>
    </section>       

</main>

<!--Footer(pie de pag)-->
<?php include '../reutilize/footer.php'; ?>
<!--FIN DE Footer(pie de pag)-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--Fin Footer(pie de pag)-->
</body>
</html>

