<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo.ico">
    <title>KIPILU - CRUD Comentarios</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estas Seguro?, se eliminarán los datos');
        }
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <!--BOOSTRAP-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--Styles-->
    <link rel="stylesheet" href="../css/CRUD_Comentarios.css">
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->
  
<?php
    include ("../db.php");
    $sql="select * from comentaristas";
    $resultado=mysqli_query($conexion,$sql);
?>
    <br><br>
    <h1>Lista de Comentarios en Kipilú</h1><br>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre(s)</th>
                <th>Apellido(s)</th>
                <th>Comentario</th>
                <th>CONTROL</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas=mysqli_fetch_assoc($resultado)){

            
            ?>
            <tr>
                <td><?php echo $filas['ID_Comentario'] ?></td>
                <td><?php echo $filas['Nombre'] ?></td>
                <td><?php echo $filas['Apellido'] ?></td>
                <td><?php echo $filas['Comentario'] ?></td>
                <td>
                    
                <?php echo "<a href='Eliminar_Comentario.php?ID_Comentario=".$filas['ID_Comentario']."' 
                    onclick='return confirmar()'><span class='eliminar-icon'>Eliminar Comentario</span></a>"; ?>
                </td>
            </tr>
        </tbody>
        <?php
    }
    ?>
    </table>
   <?php
       mysqli_close($conexion);
   ?>
    
</body>
</html>
