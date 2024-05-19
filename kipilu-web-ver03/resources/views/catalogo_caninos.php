<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Catálogo de Caninos</title>
    <link rel="icon" href="img/logo.ico">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--MENU-->
    <link rel="stylesheet" href="css/men_fot.css">
    <!--PROPIO-->
    <link rel="stylesheet" href="css/catalogo.css">
    <!--LLAMAR ICONOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>

  .contenido {
    background :linear-gradient(to right, #c98139, #f13737cc, #eb7754e7, #cf8058);
    color: #fff;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
}
.animal-card {
        background-color: purple;
        color: white;
    }
    .animal-card .estado-adopt {
        background-color: orange;
    }
    .animal-card .estado-proceso {
        background-color: yellow;
    }
    .card-text .btn {
        margin-top: 5px;
    }

    .card {
        height: 100%;
    }

    .card .card-img-top {
        height: 200px;
        object-fit: cover;
    }

    .card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
  }

  .card-title,
  .card-text,
  .card-text .btn {
    margin-bottom: 5px;
  }

  .card-text .btn {
    margin-top: auto;
  }

</style>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu.php'; ?>
<!--Cierre Nav(navegacion)-->

  <main>
  <div class="portadaf">
        <div class="contenido">
            <div class="texto">
                <h1>Bienvenido al Catálogo de Caninos</h1>
                <p>Explora nuestra selección de perros en busca de un hogar.</p>
            </div>
            <div class="opciones">
                <h2>Características:</h2>
                <ul>
                    <li>Perros de diferentes razas disponibles</li>
                    <li>Información detallada sobre cada perro</li>
                    <li>Opciones de adopción</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="separador">
        <hr class="linea-roja">
        <h2 class="titulo-adoptar">ADOPTA, NO COMPRES</h2>
        <p class="texto-pequeno">Busca a tu amigo peludo que está en búsqueda de un hogar</p>
    </section>

    <div class="container mt-5">
        <div class="row">
            <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <?php if ($fila['Estado_Animal'] != 1) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="img-container">
                                <img src="<?php echo $fila['Foto']; ?>" class="card-img-top" alt="<?php echo $fila['Nombre_Animal']; ?>">
                            </div>
                            <div class="card-body">
                                <b><h5 class="card-title">Nombre: <?php echo $fila['Nombre_Animal']; ?></h5></b>
                                <p class="card-title">Raza: <?php echo $fila['Nombre_Raza']; ?></p>
                                <p class="card-text">Sexo: <?php echo $fila['Sexo'] == 1 ? 'Hembra' : 'Macho'; ?></p>
                                <p class="card-text" style="text-align: justify;">Descripción: <?php echo $fila['Descripcion']; ?></p>
                                <p class="card-text">Estado de adopción:
                                    <?php
                                    if ($fila['Estado_Animal'] == 1) {
                                        echo "Adoptado";
                                        echo '<button class="btn btn-danger">No se puede adoptar</button>';
                                    } elseif ($fila['Estado_Animal'] == 2) {
                                        echo "No adoptado";
                                        echo "<br>";
                                        echo '<a href="Formulario_adoptante/formulario_adop.php?animal_id=' . $fila['ID_Animal'] . '&catalogo=caninos" class="btn btn-primary">Formulario de Adopción</a>';
                                    } elseif ($fila['Estado_Animal'] == 3) {
                                        echo "En proceso";
                                        echo '<button class="btn btn-warning">Otra persona en proceso</button>';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>


  </main>

<br><br>

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
          <a href="https://twitter.com/ManuelM16762431" target="_blank" class="social-media-icon">
              <i class="fab fa-x"></i>
          </a>
          <a href="https://www.instagram.com/juancm484?r=nametag" target="_blank" class="social-media-icon">
              <i class="fab fa-instagram"></i>
          </a>
      </div>
  </div>
  <!--no eliminar linea-->
  <div class="line"></div>
  <!--no eliminar linea-->
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--Fin Footer(pie de pag)-->
</body>
</html>