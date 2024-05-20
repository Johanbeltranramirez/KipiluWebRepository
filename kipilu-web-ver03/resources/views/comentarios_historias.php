<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILÚ - Comentarios</title>
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous">
    </script>

            <link rel="icon" href="../../assets/icon/logo.ico">

    <!--PROPIO-->
    <link rel="stylesheet" href="../css/comentarios_historias.css">
    <!--LLAMAR ICONOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu.php'; ?>
<!--Cierre Nav(navegacion)-->

<main>
<article class="caja">
    <section class="cajaderecha">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="form-container">
                        <h1 class="text-center">COMENTARIOS</h1>
                        <h5 class="text-center">Hola!</h5>
                        <h5 class="text-center">Déjanos tu opinión</h5>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="Nombre">Nombre:</label>
                                <input type="text" class="form-control" name="Nombre" placeholder="Digite un nombre" maxlength="30" required>
                            </div>
                            <div class="form-group">
                                <label for="Apellido">Apellido:</label>
                                <input type="text" class="form-control" name="Apellido" placeholder="Digite un apellido" maxlength="30" required>
                            </div>
                            <div class="form-group">
                                <label for="Comentario">Comentario:</label>
                                <textarea class="form-control" name="Comentario" placeholder="Digite su comentario" maxlength="150" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Enviar comentario</button>
                        </form>
                    </div>

                    <h2 class="mt-5 text-center">Poste de comentarios</h2>
                    <hr style="border: 1px solid #A52020;">
                    <ul class="list-group Comentaristas-list show-Comentaristas">
                        //*Añadir PDO
                    </ul>
                    <button class="btn btn-primary btn-block show-comments">Mostrar Comentarios</button>
                    <button class="btn btn-primary btn-block hide-comments">Ocultar Comentarios</button>
                </div>
            </div>
        </div>
    </section>

    <section class="cajaizquierda">
        <article class="poste">
            <p>Historias de éxito</p>
            <div class="clip"></div>
            <div class="carta">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/HDE_MATEO.jpg" class="img-fluid custom-image rounded-start" alt="Imagen1">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><small class="text-muted">Fecha • 03/04/2023</small></p>
                            <h5 class="card-title">Mateo</h5>
                            <p class="card-text">Desde que lo adoptamos nuestra hija se ha vuelto más alegre y conversadora.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carta">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/HDE_SAMUELNATA.jpg" class="img-fluid custom-image rounded-start" alt="Imagen2">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><small class="text-muted">Fecha • 01/04/2022</small></p>
                            <h5 class="card-title">Samuel y Nata</h5>
                            <p class="card-text">Hemos tenido la maravillosa oportunidad de explorar nuevos lugares gracias a Max, tiene un espíritu aventurero.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carta">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/HDE_ALEJA.webp" class="img-fluid custom-image rounded-start" alt="Imagen3">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><small class="text-muted">Fecha • 03/04/2023</small></p>
                            <h5 class="card-title">Aleja</h5>
                            <p class="card-text">Ahora que tengo a mi compañero canino no me he sentido sola, he comenzado a tener una vida más entretenida.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carta">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../assets/img/HDE_MONI.jpg" class="img-fluid custom-image rounded-start" alt="Imagen4">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><small class="text-muted">Fecha • 25/08/2022</small></p>
                            <h5 class="card-title">Moni</h5>
                            <p class="card-text">Cada que llego a casa sé que mi amigo peludo me estará esperando con una gran sonrisa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</article>
</main>

<!--Footer(pie de pag)-->
<?php include '../reutilize/footer.php'; ?>
<!--Footer(pie de pag)-->

<script defer src="../js/Mostrar_Comentarios.js"></script>

<script src="path/to/bootstrap.bundle.min.js"></script>

</body>
</html>
